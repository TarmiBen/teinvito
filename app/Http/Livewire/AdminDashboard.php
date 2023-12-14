<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Device;
use App\Models\User;
use App\Models\Service;
use App\Models\Event;
use App\Models\Invitation;
use App\Models\Section;
use App\Models\ServicePackage;
use App\Models\UserProvider;
use App\Models\guests;
use App\Models\Ip_address;
use App\Models\Visit;
use Illuminate\Support\Facades\Auth;

class AdminDashboard extends Component
{
    public $view;
    public $totalVisits;
    public $MostFamous;

    public function mount()
    {
        $colors = ['red', 'blue', 'green', 'purple', 'orange', 'yellow' ];

        $this->totalVisits = Visit::all()->mapWithKeys(function ($visit) use ($colors) {
            $color = $colors[array_rand($colors)];
    
            return [$visit->name => [
                'weekly_count' => $visit->weekly_count,
                'goal' => $goal = 200,
                'percentage' => ($visit->weekly_count / $goal) * 100,
                'color' => $color,
            ]];
        })->toArray();

        $this->MostFamous = Visit::orderBy('monthly_count', 'desc')->take(4)->get()->mapWithKeys(function ($visit) use ($colors) {
            $color = $colors[array_rand($colors)];
        
            return [$visit->name => [
                'monthly_count' => $visit->monthly_count,
                'goal' => $goal = 1000,
                'percentage' => ($visit->monthly_count / $goal) * 100,
                'color' => $color,
            ]];
        })->toArray();
        
        $this->dispatchBrowserEvent('disablePolling');
    }

    public function renderChart()
    {
        $data = $this->getData();
        $this->emit('chartRendered', ['labels' => $data['labels'], 'data' => $data['data']]);
    }

    public function render()
    {

        $counts = [
            'companys' => Company::getCounts(),
            'addresses' => Address::getCounts(),
            'contacts' => Contact::getCounts(),
            'categories' => Category::getCounts(),
            'users' => User::getCounts(),
            'services' => Service::getCounts(),
            'events' => Event::getCounts(),
            'guests' => guests::getCounts(),
            'invitations' => Invitation::getCounts(),
            'sections' => Section::getCounts(),
            'servicePackages' => ServicePackage::getCounts(),
            'userProviders' => UserProvider::getCounts(),
        ];
        $browserData = Device::selectRaw('
            browser, COUNT(*) as total_entries, SUM(CASE WHEN MONTH(created_at) = ? AND YEAR(created_at) = ? THEN 1 ELSE 0 END) as monthly_entries', [date('m'), date('Y')])
            ->groupBy('browser')->get()->keyBy('browser')->toArray();
        $data = $this->getData();
        $this->emit('chartRendered', ['labels' => $data['labels'], 'data' => $data['data']]);
        return view('livewire.admin-dashboard', compact('counts', 'browserData', 'data'));
    }

    private function getData()
    {
        if (!$this->view) {
            $this->view = 'weekly';
        }
    
        // Get the unique route names
        $routeNames = Visit::pluck('name')->unique()->toArray();
    
        $data = [];
    
        foreach ($routeNames as $routeName) {
            switch ($this->view) {
                case 'daily':
                    $data[] = Visit::where('name', $routeName)->sum('daily_count');
                    break;
                case 'weekly':
                    $data[] = Visit::where('name', $routeName)->sum('weekly_count');
                    break;
                case 'monthly':
                default:
                    $data[] = Visit::where('name', $routeName)->sum('monthly_count');
                    break;
            }
        }
    
        return [
            'labels' => $routeNames,
            'data' => $data,
        ];
    }

    public function switchView($view)
    {
        $this->view = $view;
    }
}
