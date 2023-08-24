
تُوفِّر الواجهات الساكنة واجهة "ساكنة" (static) للأصناف المتوافرة في حاوي خدمات تطبيقك. يأتي Laravel مع عدة واجهات تمكنك من استخدام كل خاصيات Laravel تقريبًا. تمثل واجهات Laravel الساكنة "وسطاء ساكنات" (static proxies) للأصناف الأساسية بحاوي الخدمات مما يوفر كل فوائد الصِّيغ (syntax) المقتضبة والمُعبِّرة مع الحفاظ على قابلية الاختبار ومرونة أكبر من الدالات الساكنة التقليدية.

كل واجهات Laravel الساكنة مُعرَّفةٌ في مجال الأسماء Illuminate\Support\Facades. يمكننا الوصول لواجهة ساكنة بهذه الطريقة:

use Illuminate\Support\Facades\Cache;

Route::get('/cache', function () {
    return Cache::get('key');
});


متى نستخدم الواجهات الساكنة؟
للواجهات الساكنة فوائد كثيرة فهي توفِّر صيغةً مقتضبةً وسهلة التذكّر تسمح لنا باستخدام خاصيات Laravel دون حفظ أسماء الأصناف الطويلة التي تسلتزم إضافتها وإعدادها يدويًا. علاوة على ذلك، اختبارهن أسهل بفضل استخدامهن الفريد لدوال PHP الدَيناميكيَة.

يجب الاحتياط عند استخدام الواجهات الساكنة حيث أنّ خطرهم الرئيسي هو زحف مجال الصَنف (class scope). بما أن الواجهات السَاكنة سهلة الاستخدام ولا تتطلب إضافات، قد يسهل ترك صنفك يواصل التضخَم بشكل هام عند استخدام عدَة واجهات سَاكنة في صنف واحد. يمكن الحد من هذه المشكلة باستخدام إضافة الاعتماديات (dependency injection)، اذ ان التحذيرات المرئية التي تصدرها دالة بناء constructor ضخمة تعلمك ان صنفك تضخَّم أكثر من اللازم. لذلك أعر انتباهًا خاصًا لحجم صنفك كي يظل مجال مسؤوليته (scope of responsibility) ضيَقًا.

ملاحظة: عند بناء حزمة طرف ثالث تتعامل مع Laravel، من الأفضل إضافة عقود Laravel ‏(Laravel contracts) بدل استخدام الواجهات الساكنة لأنّ الحزم المبنيّة خارج Laravel ذاته لن تستطيع استخدام مساعدي اختبار واجهات Laravel الساكنة (facade testing helpers)

الواجهات وإضافة الاعتماديّة (dependency injection)
القدرة على استبدال تعاريف استخدام (implementations) الصنف المضاف هي إحدى فوائد إضافة الاعتماديّة الأساسية. هذه الخاصية مفيدة عند الاختبار بما أنك تقدر على إضافة غرض مُقلِّد (mock) أو بذرة (stub) وتتحقق من استدعاء مختلف الدوال في تلك البذرة.

ليس من الممكن عادة استخدام الأغراض المُقلِّدة أو البذور على دالَة ساكنة فعلًا (static class method). مع ذلك، لمّا كانت الواجهات الساكنة تستخدم دوالًا ديناميكية لتوكيل استدعاء كائنات (objects) مستبينة من حاوي الخدمات، يمكننا اختبار الواجهات الساكنة تمامًا كما نختبر نسخة صنف مضاف. خذ مثلًا المسار الآتي:

use Illuminate\Support\Facades\Cache;

Route::get('/cache', function () {
    return Cache::get('key');
});

يمكننا كتابة الاختبار التالي للتحقق من استدعاء الدالة Cache::get بالمتغيَر الوسيط (argument) الذي توقعناه:

use Illuminate\Support\Facades\Cache;

/**
 * مثال دالة بانية بسيطة.
 *
 * @return void
 */
public function testBasicExample()
{
    Cache::shouldReceive('get')
         ->with('key')
         ->andReturn('value');

    $this->visit('/cache')
         ->see('value');
}

الواجهات الساكنات والدوال البانية المساعدة (Helper Function)
إضافة للواجهات الساكنة، يتضمن Laravel عدة دوال بانية "مُساعدة" قادرة على تنفيذ مهام شائعة مثل توليد الواجهات (views)، وإطلاق الأحداث، وإرسال الأعمال (jobs)، أو إرسال ردود HTTP. تقوم عدَة دوال مُساعدة بنفس وظيفة الواجهة السَاكنة المناظرة. ففي المثال الآتي سيكون استدعاء هذه الواجهة هو نظير استدعاء الدالة المساعدة:

return View::make('profile');

return view('profile');
لا يوجد أي فرق تطبيقي بين الواجهات السَاكنة والدوال المُساعدة بتاتًا. تستطيع اختبار الدَالة ونظيرتها الواجهة الساكنة بنفس الطريقة بالضبط. فلنأخذ المسار التالي مثلًا:

Route::get('/cache', function () {
    return cache('key');
});
مُساعد الذاكرة المؤقتة سيستدعي التابع get على الصَنف الكامن وراء واجهة الذاكرة المؤقتة الساكنة وراء الكواليس. لذا نستطيع كتابة الاختبار التالي للتحقق من أن التابع استُدعِيَ بنفس المتغيَر الوسيط (argument) الذي نتوقَعه رغم أننا نستخدم الداَلة المساعدة:

use Illuminate\Support\Facades\Cache;

/**
 * مثال دالة بانية بسيطة.
 *
 * @return void
 */
public function testBasicExample()
{
    Cache::shouldReceive('get')
         ->with('key')
         ->andReturn('value');

    $this->visit('/cache')
         ->see('value');
}

كيفية عمل الواجهات الساكنة
في تطبيقات Laravel، الواجهة الساكنة هي صنف يوفر الوصول لكائن من الحاوي. الآلية التي تسمح بحدوث هذا موجودة في الصنف Facade. واجهات Laravel الساكنة إضافة لأي واجهة تنشئها ستوسِّع صنف Illuminate\Support\Facades\Facade الأساسي.

يستغل صنف الواجهة الساكنة Facade الأساسي الدالة السحرية  ()callStatic__ لتأجيل الاستدعاء من الواجهة لكائن مُسْتَبْيَن من الحاوي. في المثال أدناه يُرسَل استدعاء نظام لذاكرة Laravel المؤقتة. بنظرة خاطفة على هذه التعليمات يمكن للمرء افتراض أن الدالة الساكنة get استُدعِيَت على صنف ذاكرة التخزين المؤقتة Cache:



namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /**
     * عرض ملف المستخدم الشخصي
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile($id)
    {
        $user = Cache::get('user:'.$id);

        return view('profile', ['user' => $user]);
    }
}


لاحظ كيف أننا "نستورد" واجهة ذاكرة التخزين المؤقتة Cache قرب الجزء العلوي من الملف. هذه الواجهة بمثابة وكيل للوصول لتعريف الاستخدام (implementation) الكامن وراء واجهة Illuminate\Contracts\Cache\Factory. سيمرر أي استدعاء نقوم به باستخدام الواجهة الساكنة للنسخة الكامنة وراء خدمة ذاكرة Laravel المؤقتة. إن نظرنا لصنف Illuminate\Support\Facades\Cache، سنرى أنه لا وجود للتابع الساكن get:

class Cache extends Facade
{
    /**
     * تحصل على اسم المُكوِّن المُسجَل
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'cache'; }
}

بدلًا عن هذا، تُوسِّع واجهة ذاكرة التخزين المؤقتة الساكنة Cache صنف الواجهة الساكنة الأساسي Facade وتُعرًف التابع ()getFacadeAccessor. وظيفة هذا التابع هي رد اسم ارتباط حاوي الخدمات. يستبين Laravel ارتباط الذاكرة المؤقتة cache من حاوي الخدمات عندما يشير المستخدم لأي دالة ساكنة بواجهة ذاكرة التخزين المؤقتة الساكنة، ثم يُنفِّذ الدالة المطلوبة (في هذه الحالة get) على ذاك الكائن.

الواجهات الساكنة في الوقت الحالي (Real-Time Facades)
يمكنك معالجة أي صنف في تطبيقك كما لو كان واجهة ساكنة باستخدام الواجهات الساكنة في الوقت الحالي. لتوضيح كيفية الاستخدام فلندرس بديلا. فلنفترض مثلًا أن لنَموذَجِنَا Podcast التابع publish. لكي ننشر podcast نحتاج لإضافة نسخة Publisher :


namespace App;

use App\Contracts\Publisher;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    /**
     * Publish the podcast.
     *
     * @param  Publisher  $publisher
     * @return void
     */
    public function publish(Publisher $publisher)
    {
        $this->update(['publishing' => now()]);

        $publisher->publish($this);
    }
}

تسمح لنا إضافة تعريف استخدام للناشر للتابع باختبار الدالة بسهولة على انفراد بما أننا قادرون على تقليد (mock) الناشر المُضَاف. مع ذلك يستلزمنا أن نُمَرِّر نسخة من publisher في كل مرة نستدعي فيها التابع publish. يمكننا الحفاظ على نفس القدرة على الاختبار دون الاضطرار إلى تمرير نسخة Publisher صراحة (explicitly)  باستخدام الواجهات الساكنة بالوقت الحالي. لتوليد واجهات ساكنة بالوقت الحالي، أسبق مجال أسماء الصنف المُستَوْرَد بالكلمة Facades:



namespace App;

use Facades\App\Contracts\Publisher;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    /**
     * Publish the podcast.
     *
     * @return void
     */
    public function publish()
    {
        $this->update(['publishing' => now()]);

        Publisher::publish($this);
    }
}
يستبين تعريف استخدام الناشر من حاوي الخدمات باستخدام جزء الواجهة (interface) أو اسم الصنف الذي يظهر بعد استخدام واجهات ساكنة بالوقت الحالي بعد سابقة Facades. يمكننا استخدام مُساعدي اختبار Laravel المُدمجات لتقليد استدعاء هذا التابع عند الاختبار:

namespace Tests\Feature;

use App\Podcast;
use Tests\TestCase;
use Facades\App\Contracts\Publisher;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PodcastTest extends TestCase
{
    use RefreshDatabase;
  /**
     * مثال اختبار 
     *
     * @return void
     */
    public function test_podcast_can_be_published()
    {
        $podcast = factory(Podcast::class)->create();

        Publisher::shouldReceive('publish')->once()->with($podcast);

        $podcast->publish();
    }
}