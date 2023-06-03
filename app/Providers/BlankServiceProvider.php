namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\BlankService;

class BlankServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('blank-service', function () {
            return new BlankService();
        });
    }
}
