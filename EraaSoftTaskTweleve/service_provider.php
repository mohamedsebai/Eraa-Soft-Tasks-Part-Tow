مقدمة
مقدمو الخدمات هن الموقع المركزي لكامل عمليات تمهيد تطبيق Laravel. تطبيقك، ككامل خدمات Laravel الجوهرية، مُمَهَّد عبر مقدمي الخدمات. لكن ما الذي نقصده "بالتمهيد" (bootstrapping)؟ نقصد به عمومًا تسجيل الأشياء، بما في ذلك تسجيل ارتباطات حاويات الخدمات، ومنصتات الأحداث، والبرمجيات الوسيطة، وحتى المسارات (routes). مقدمو الخدمات هي المكان المركزي لإعداد تطبيقك مثلما ذكرنا سابقًا. إن فتحت الملف config/app.php المتضمن في Laravel فسترى المصفوفة providers، والتي تمثّل كل أصناف مقدمي الخدمات التي سَتُحَمَّل من أجل تطبيقك. كثير منهن طبعا مقدمون "مؤجلون"، أي أنهن لن يتُحَمَّلن عند كل طلب بل عند الحاجة إلى خدماتها فقط.

في هذه النظرة العامة ستتعلم كيف تكتب مقدمي خدماتك وتسجلهم في تطبيق Laravel الخاص بك.

كتابة مقدمي الخدمات
تُوسِّع كل مقدمو الخدمات الصنف Illuminate\Support\ServiceProvider. يحتوي أغلب مقدمو الخدمات دالة register و boot. يجب ربط الأشياء داخل حاوي الخدمات فقط  داخل كل دالة register. لا يجب أن تحاول تسجيل أي منصت أحداث، مسار أو أي جزء وظيفي آخر ضمن دالة register.

تولّد واجهة سطر الأوامر لبرمجية Artisan مقدّمًا جديدًا باستخدام الأمر make:provider:

php artisan make:provider RiakServiceProvider
التابع register
كما ذُكِر سابقًا، يجب أن تربط الأشياء فقط في حاوي الخدمات في تابع التسجيل register. لا يجب أن تحاول أبدًا تسجيل أي منصت أحداث، أو مسار، أو أي جزء وظيفي آخر ضمن تابع التسجيل. إن لم تفعل ذلك، فقد تستخدم خدمة لم يُحَمَّل مقدم خدماتها بعد عن غير قصد.

فلنلقِ نظرة على مقدم خدمات بسيط. لديك دائما حق الوصول لخاصية app$ في أي من توابع مقدم الخدمة والتي تمنحك القدرة على الوصول لحاوي الخدمات:



namespace App\Providers;

use Riak\Connection;
use Illuminate\Support\ServiceProvider;

class RiakServiceProvider extends ServiceProvider
{
    /**
     * تسجيل الارتباطات  في الحاوي
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Connection::class, function ($app) {
            return new Connection(config('riak'));
        });
    }
}


تُعَرِّف هذه الخدمة دالة التسجيل فقط وتستخدم تلك الدالة لتُعَرِّف تعريف الاستخدام Riak\Connection في حاوي الخدمات. إن لم تفهم كيفية عمل حاوي الخدمات ألقِ نظرةً على توثيقه.

الخاصيات bindings  و singletons
إن سجل مقدم خدمتك عدة ارتباطات بسيطة، فقد ترغب في استخدام الخاصيات bindings و singletons بدل تسجيل كل ارتباط بالحاوي على حدة. عندما يُحَمَّل مقدم الخدمات من طرف إطار العمل سيتفقد هذه الخاصيات تلقائيًا ويسجل ارتباطاتها:



namespace App\Providers;

use App\Contracts\ServerProvider;
use App\Contracts\DowntimeNotifier;
use Illuminate\Support\ServiceProvider;
use App\Services\PingdomDowntimeNotifier;
use App\Services\DigitalOceanServerProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
  *. يجب تسجيل كل ارتباطات الحاوي.
     *
     * @var array
     */
    public $bindings = [
        ServerProvider::class => DigitalOceanServerProvider::class,
    ];

    /**
     *  الحاوي singletons يجب تسجيل جميع 
     * @var array
     */
    public $singletons = [
        DowntimeNotifier::class => PingdomDowntimeNotifier::class,
    ];
}
التابع boot
ماذا لو احتجنا لتسجيل مؤلف عرض (view composer) داخل مقدم خدماتنا؟ يجب القيام بذلك داخل التابع boot. يُنادى هذا التابع بعد تسجيل كل مقدمي الخدمات الأخرى، أي عندما يكون لديك حق الولوج لكل خدمة أخرى مُسجَّلة في إطار العمل:



namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * مَهِّد أية خدمات تطبيقية
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('view', function () {
           //
        });
    }
}

إضافة الاعتماديَّة للتابع Boot
تستطيع التلميح عن نوع (type-hint) الاعتمادية للتابع boot بمقدم خدماتك. سيضيف حاوي الخدمات أي اعتماديات تحتاج لها تلقائيًا:

use Illuminate\Contracts\Routing\ResponseFactory;

public function boot(ResponseFactory $response)
{
    $response->macro('caps', function ($value) {
       //
    });
}


تسجيل المقدِّمين
كل مقدمي الخدمات مُسَجَّلات في ملف الإعدادات config/app.php. يتضمن هذا الملف مصفوفة من المُقَدِّمين providers حيث تستطيع إيراد أسماء أصناف مُقَدِّمي خدماتك. ستجد هناك قائمةً تحتوي أسماء مقدمي الخدمات الأساسية لإطار Laravel افتراضيًّا. يُمَهِّد (bootstrap) هؤلاء المُقَدِّمون مكوِّنات Laravel الجوهرية مثل المُرسِل (mailer)، والطابور (queue)، وذاكرة التخزين المؤقتة (cache)، وغيرها.

لتُسَجِّل مُقَدِّمك أضفه لهذه المصفوفة:

'providers' => [
   // مقدمو الخدمات الأخرى
    App\Providers\ComposerServiceProvider::class,
],
المقدِّمون المؤجَّلون
يمكنك تأجيل تسجيل مقدم خدماتك حتى تحتاج لإحدى ارتباطاته المُسجَّلة ان كان يُسجّل ارتباطاته (bindings) في حاوي الخدمات حصرا. يُحسِّن تأجيل تحميل هذا النوع من المقدمين من أداء تطبيقك بما أنها لا تحمَّل من نظام الملفات مع كل طلب.

يُتَرجِم Laravel ويُخَزِّن قائمة من كل الخدمات التي توفِّرها مُقدِّمات الخدمات المُؤجَّلات. ثم يُحَمَّل Laravel مقدم الخدمة فقط عندما تحاول قبول (resolve) أحد تلك الخدمات.

لتأجيل تحميل مقدِّم ما، اضبط خاصية التأجيل defer على true وعرِّف دالة تقديم provides. يجب على دالة التقديم provides رد إرتباطات حاوي الخدمات التي سجلها المقدِّم:



namespace App\Providers;

use Riak\Connection;
use Illuminate\Support\ServiceProvider;

class RiakServiceProvider extends ServiceProvider
{
    /**
     * تشير إن كان المقدِّم مُؤجَّلا
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * تسجيل لمقدِّم الخدمات
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Connection::class, function ($app) {
            return new Connection($app['config']['riak']);
        });
    }

    /**
     * .الحصول على الخدمة التي يوفرها مقدِّم الخدمات
     *
     * @return array
     */
    public function provides()
    {
        return [Connection::class];
   }

}