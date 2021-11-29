<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class TeamController extends Controller
{
    /**
     * This is used to return teams index view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $team = Team::get()->toArray();
        if (empty($team)) {
            $team = [];
        }
        $homeTeamData = Team::where('team_title', 'Home Team')->get()->toArray();
        $awayTeamData = Team::where('team_title', 'Away Team')->get()->toArray();
        $arrHome = [];
        $arrAway = [];
        if (!empty($homeTeamData)){
            foreach ($homeTeamData as $key => $home) {
                $arrHome[$key][''] = $home['player_number'];
                $arrHome[$key]['Dunk'] = $home['dunk'];
                $arrHome[$key]['Shooting'] = $home['shooting'];
                $arrHome[$key]['Defence'] = $home['defense'];
                $arrHome[$key]['Playmaking'] = $home['play_making'];
            }

            foreach ($arrHome as $ind => $item) {
                $dunk = (isset($item['Dunk']) && !empty($item['Dunk']) ? $item['Dunk'] : '');
                $shooting = (isset($item['Shooting']) && !empty($item['Shooting']) ? $item['Shooting'] : '');
                $defence = (isset($item['Defence']) && !empty($item['Defence']) ? $item['Defence'] : '');
                $playMaking = (isset($item['Playmaking']) && !empty($item['Playmaking']) ? $item['Playmaking'] : '');
                $total = +$dunk + +$shooting + +$defence + +$playMaking;
                $arrHome[$ind]['total'] = $total;
            }
        }

        if (!empty($awayTeamData)){
            foreach ($awayTeamData as $key => $home) {
                $arrAway[$key][''] = $home['player_number'];
                $arrAway[$key]['Dunk'] = $home['dunk'];
                $arrAway[$key]['Shooting'] = $home['shooting'];
                $arrAway[$key]['Defence'] = $home['defense'];
                $arrAway[$key]['Playmaking'] = $home['play_making'];
            }

            foreach ($arrAway as $ind => $item) {
                $dunk = (isset($item['Dunk']) && !empty($item['Dunk']) ? $item['Dunk'] : '');
                $shooting = (isset($item['Shooting']) && !empty($item['Shooting']) ? $item['Shooting'] : '');
                $defence = (isset($item['Defence']) && !empty($item['Defence']) ? $item['Defence'] : '');
                $playMaking = (isset($item['Playmaking']) && !empty($item['Playmaking']) ? $item['Playmaking'] : '');
                $total = +$dunk + +$shooting + +$defence + +$playMaking;
                $arrAway[$ind]['total'] = $total;
            }
        }

        return view('teams.index', compact('team'));
    }

    /**
     * This is used to add data to table and shows on google spread sheet
     *
     * @param Request $request  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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeData(Request $request)
    {
        $data = $request->all();
        if (!empty($data)) {
            unset($data['_token']);
            $data['created_at'] = now();
            $data['updated_at'] = now();
            Team::insert($data);
        }

        $homeTeamData = Team::where('team_title', 'Home Team')->get()->toArray();
        $awayTeamData = Team::where('team_title', 'Away Team')->get()->toArray();
        $arrHome = [];
        $arrAway = [];
        if (!empty($homeTeamData)){
            foreach ($homeTeamData as $key => $home) {
                $arrHome[$key][''] = $home['player_number'];
                $arrHome[$key]['Dunk'] = $home['dunk'];
                $arrHome[$key]['Shooting'] = $home['shooting'];
                $arrHome[$key]['Defence'] = $home['defense'];
                $arrHome[$key]['Playmaking'] = $home['play_making'];
            }

            foreach ($arrHome as $ind => $item) {
                $dunk = (isset($item['Dunk']) && !empty($item['Dunk']) ? $item['Dunk'] : '');
                $shooting = (isset($item['Shooting']) && !empty($item['Shooting']) ? $item['Shooting'] : '');
                $defence = (isset($item['Defence']) && !empty($item['Defence']) ? $item['Defence'] : '');
                $playMaking = (isset($item['Playmaking']) && !empty($item['Playmaking']) ? $item['Playmaking'] : '');
                $total = +$dunk + +$shooting + +$defence + +$playMaking;
                $arrHome[$ind]['total'] = $total;
            }
        }

        if (!empty($awayTeamData)){
            foreach ($awayTeamData as $key => $home) {
                $arrAway[$key][''] = $home['player_number'];
                $arrAway[$key]['Dunk'] = $home['dunk'];
                $arrAway[$key]['Shooting'] = $home['shooting'];
                $arrAway[$key]['Defence'] = $home['defense'];
                $arrAway[$key]['Playmaking'] = $home['play_making'];
            }

            foreach ($arrAway as $ind => $item) {
                $dunk = (isset($item['Dunk']) && !empty($item['Dunk']) ? $item['Dunk'] : '');
                $shooting = (isset($item['Shooting']) && !empty($item['Shooting']) ? $item['Shooting'] : '');
                $defence = (isset($item['Defence']) && !empty($item['Defence']) ? $item['Defence'] : '');
                $playMaking = (isset($item['Playmaking']) && !empty($item['Playmaking']) ? $item['Playmaking'] : '');
                $total = +$dunk + +$shooting + +$defence + +$playMaking;
                $arrAway[$ind]['total'] = $total;
            }
        }

        return redirect()->to('/');
    }
}
