<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Management;

class AboutController extends Controller
{
    public function summary() {
        return view("about.summary", []);
    }

    public function profile() {
        return view("about.profile", []);
    }

    public function corporateStructure() {
        return view("about.corporate", []);
    }

    public function management() {
        return view("about.management", [
          'list'  => Management::orderBy("order")->get()
        ]);
    }

    public function supportingInstituion() {
        return view("about.supporting", []);
    }

    public function articleAssociation() {
        return view("about.article", []);
    }

    public function anggaranDasar()
    {
        // $content = $res->getBody();
        // $content->write(readfile(__DIR__ . "/../Files/anggaran-dasar.pdf"));

        // return $res->withHeader('Content-Type', "application/pdf")
        //     ->withHeader('Content-Transfer-Encoding', 'binary')
        //     ->withHeader('Content-Disposition', 'inline; filename="anggaran-dasar.pdf"')
        //     ->withHeader('Expires', '0')
        //     ->withHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0')
        //     ->withHeader('Pragma', 'public');
    }

    public function stackHolder()
    {
        $people = [
            [
              'id' => 1,
              'board_name' => 'group-man.1',
              'id_man' => 0,
              'position' => 0,
              'created_at' => '05 April 2022 16:57:55',
              'updated_at' => '2020-09-28T04:48:57.000000Z',
              'board_name_lang' => 'Direksi',
              'humans' => 
              [
                [
                  'id' => 4,
                  'name' => 'Sungkono Sadikin',
                  'title' => 'man-title.4',
                  'country' => 'man-country.4',
                  'birthyear' => '1968',
                  'description' => 'man-description.4',
                  'photo' => 'images/man/sungkono-sadikin-cv-1641793866.png',
                  'photo_luar' => 'images/man/detail/sungkono-sadikin-cv-1641793520.png',
                  'decision_number' => 'man-decision.4',
                  'decision_year' => NULL,
                  'show_on_board' => '1',
                  'created_at' => '05 April 2022 16:57:55',
                  'updated_at' => '2022-01-11T01:44:13.000000Z',
                  'decision_lang' => 'man-decision.4',
                  'url_profile' => 'Sungkono-Sadikin',
                  'title_lang' => 'Direktur Utama',
                ],
                [
                  'id' => 5,
                  'name' => 'Soh Ching Kher',
                  'title' => 'man-title.5',
                  'country' => 'man-country.5',
                  'birthyear' => '1961',
                  'description' => 'man-description.5',
                  'photo' => 'images/man/soh-ching-kher-1600914385.png',
                  'photo_luar' => 'images/man/detail/soh-ching-kher-1600890092.png',
                  'decision_number' => 'man-decision.5',
                  'decision_year' => NULL,
                  'show_on_board' => '1',
                  'created_at' => '05 April 2022 16:57:55',
                  'updated_at' => '2020-09-29T17:11:53.000000Z',
                  'decision_lang' => 'man-decision.5',
                  'url_profile' => 'Soh-Ching-Kher',
                  'title_lang' => 'Wakil Direktur Utama (Independen)',
                ],
                [
                  'id' => 6,
                  'name' => 'Sri Sumiyarsi',
                  'title' => 'man-title.6',
                  'country' => 'man-country.6',
                  'birthyear' => '1967',
                  'description' => 'man-description.6',
                  'photo' => 'images/man/sri-sumiyarsi-1600914433.png',
                  'photo_luar' => 'images/man/detail/sri-sumiyarsi-1600890147.png',
                  'decision_number' => 'man-decision.6',
                  'decision_year' => '2016-12-21',
                  'show_on_board' => '1,3',
                  'created_at' => '05 April 2022 16:57:55',
                  'updated_at' => '2020-09-29T17:11:00.000000Z',
                  'decision_lang' => 'Ibu Sri Sumiyarsi menjabat sebagai Sekretaris Perusahaan berdasarkan keputusan No. Kep-SK/Dir/P-035/-CO/XII-16. Efektif sejak 21 Desember 2016',
                  'url_profile' => 'Sri-Sumiyarsi',
                  'title_lang' => 'Direktur & Sekretaris Perusahaan',
                ],
                [
                  'id' => 7,
                  'name' => 'Wayan Sumantra',
                  'title' => 'man-title.7',
                  'country' => 'man-country.7',
                  'birthyear' => '1964',
                  'description' => 'man-description.7',
                  'photo' => 'images/man/wayan-sumantra-1600914476.png',
                  'photo_luar' => 'images/man/detail/wayan-sumantra-1600890161.png',
                  'decision_number' => 'man-decision.7',
                  'decision_year' => NULL,
                  'show_on_board' => '1',
                  'created_at' => '05 April 2022 16:57:55',
                  'updated_at' => '2020-09-29T17:11:55.000000Z',
                  'decision_lang' => 'man-decision.7',
                  'url_profile' => 'Wayan-Sumantra',
                  'title_lang' => 'Direktur',
                ],
              ],
            ],
            [
              'id' => 2,
              'board_name' => 'group-man.2',
              'id_man' => 0,
              'position' => 1,
              'created_at' => '05 April 2022 16:57:55',
              'updated_at' => '2020-09-28T04:49:00.000000Z',
              'board_name_lang' => 'Komisaris',
              'humans' => 
              [ 
                [
                  'id' => 1,
                  'name' => 'Antonius Joenoes Supit',
                  'title' => 'man-title.1',
                  'country' => 'man-country.1',
                  'birthyear' => '1953',
                  'description' => 'man-description.1',
                  'photo' => 'images/man/antonius-joenoes-supit-1600914043.png',
                  'photo_luar' => 'images/man/detail/antonius-joenoes-supit-1600889782.png',
                  'decision_number' => 'man-decision.1',
                  'decision_year' => NULL,
                  'show_on_board' => '2',
                  'created_at' => '05 April 2022 16:57:55',
                  'updated_at' => '2020-09-29T17:11:22.000000Z',
                  'decision_lang' => 'man-decision.1',
                  'url_profile' => 'Antonius-Joenoes-Supit',
                  'title_lang' => 'Komisaris Utama (Independen)',
                ], 
                [
                  'id' => 2,
                  'name' => 'Eddy Tamboto',
                  'title' => 'man-title.2',
                  'country' => 'man-country.2',
                  'birthyear' => '1972',
                  'description' => 'man-description.2',
                  'photo' => 'images/man/eddy-tamboto-1629261154.jpg',
                  'photo_luar' => 'images/man/detail/eddy-tamboto-1629261154.jpg',
                  'decision_number' => 'man-decision.2',
                  'decision_year' => NULL,
                  'show_on_board' => '2',
                  'created_at' => '05 April 2022 16:57:55',
                  'updated_at' => '2021-08-18T04:32:34.000000Z',
                  'decision_lang' => 'man-decision.2',
                  'url_profile' => 'Eddy-Tamboto',
                  'title_lang' => 'Komisaris',
                ],
                [
                  'id' => 3,
                  'name' => 'Ted Margono',
                  'title' => 'man-title.3',
                  'country' => 'man-country.3',
                  'birthyear' => '1975',
                  'description' => 'man-description.3',
                  'photo' => 'images/man/ted-margono-1641452011.png',
                  'photo_luar' => 'images/man/detail/setiawan-achmad-1629263031.png',
                  'decision_number' => 'man-decision.3',
                  'decision_year' => NULL,
                  'show_on_board' => '2',
                  'created_at' => '05 April 2022 16:57:55',
                  'updated_at' => '2022-01-06T06:53:31.000000Z',
                  'decision_lang' => 'man-decision.3',
                  'url_profile' => 'Ted-Margono',
                  'title_lang' => 'Komisaris',
                ],
                [
                  'id' => 8,
                  'name' => 'Theo Lekatompessy',
                  'title' => 'man-title.8',
                  'country' => 'man-country.8',
                  'birthyear' => '1961',
                  'description' => 'man-description.8',
                  'photo' => 'images/man/theo-lekatompessy-1600914544.png',
                  'photo_luar' => 'images/man/detail/theo-lekatompessy-1600890172.png',
                  'decision_number' => 'man-decision.8',
                  'decision_year' => NULL,
                  'show_on_board' => '2',
                  'created_at' => '05 April 2022 16:57:55',
                  'updated_at' => '2020-09-29T17:11:57.000000Z',
                  'decision_lang' => 'man-decision.8',
                  'url_profile' => 'Theo-Lekatompessy',
                  'title_lang' => 'Komisaris Independen',
                ],
              ],
            ],
            [
              'id' => 3,
              'board_name' => 'group-man.3',
              'id_man' => 0,
              'position' => 2,
              'created_at' => '05 April 2022 16:57:55',
              'updated_at' => '2020-09-28T04:49:03.000000Z',
              'board_name_lang' => 'Sekretaris Perusahaan',
              'humans' => 
              [
                [
                  'id' => 6,
                  'name' => 'Sri Sumiyarsi',
                  'title' => 'man-title.6',
                  'country' => 'man-country.6',
                  'birthyear' => '1967',
                  'description' => 'man-description.6',
                  'photo' => 'images/man/sri-sumiyarsi-1600914433.png',
                  'photo_luar' => 'images/man/detail/sri-sumiyarsi-1600890147.png',
                  'decision_number' => 'man-decision.6',
                  'decision_year' => '2016-12-21',
                  'show_on_board' => '1,3',
                  'created_at' => '05 April 2022 16:57:55',
                  'updated_at' => '2020-09-29T17:11:00.000000Z',
                  'decision_lang' => 'Ibu Sri Sumiyarsi menjabat sebagai Sekretaris Perusahaan berdasarkan keputusan No. Kep-SK/Dir/P-035/-CO/XII-16. Efektif sejak 21 Desember 2016',
                  'url_profile' => 'Sri-Sumiyarsi',
                  'title_lang' => 'Direktur & Sekretaris Perusahaan',
                ],
              ],
            ],
          ];

        return response()->json($people);
    }
}
