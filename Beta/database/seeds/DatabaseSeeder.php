<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

use App\User;
use App\Skills;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Default data deceleration
        $i = 1;
        
        $skills = [
            'Sales',
            'Financiën',
            'Onderzoek',
            'Design'
        ];
    
        $levels = [
            25,
            100,
            250,
            550,
            1150,
            2350,
            4750,
            9550,
            19150,
            38350,
            76750
        ];
        
        $entryLevels = [
            'Junior',
            'Medior',
            'Senior'
        ];
        
        $assignmentTypes = [
            'Leren',
            'Werken'
        ];
    
        $assignments = [
            [
                'assignment_type_id' => 1,
                'skill_id' => 1,
                'entry_level_id' => 1,
                'title' => 'Reclame maken',
                'duration' => 7200,
                'peanuts' => -200,
                'experience_points' => 15,
                'image' => '.png'
            ],
            [
                'assignment_type_id' => 1,
                'skill_id' => 2,
                'entry_level_id' => 1,
                'title' => 'Boekhouding bijwerken.',
                'duration' => 18000,
                'peanuts' => 0,
                'experience_points' => 20,
                'image' => '.png'
            ],
            [
                'assignment_type_id' => 1,
                'skill_id' => 3,
                'entry_level_id' => 1,
                'title' => 'Computer cursus volgen.',
                'duration' => 14400,
                'peanuts' => 8585,
                'experience_points' => 8566,
                'image' => '.png'
            ],
            [
                'assignment_type_id' => 1,
                'skill_id' => 4,
                'entry_level_id' => 1,
                'title' => 'Logo maken.',
                'duration' => 3600,
                'peanuts' => 454545,
                'experience_points' => 54454,
                'image' => '.png'
            ]
            ,
            [
                'assignment_type_id' => 1,
                'skill_id' => 4,
                'entry_level_id' => 1,
                'title' => 'Testen.',
                'duration' => 5,
                'peanuts' => 10,
                'experience_points' => 5,
                'image' => '.png'
            ],
    
            [
                'assignment_type_id' => 2,
                'skill_id' => 1,
                'entry_level_id' => 1,
                'title' => 'Reclame maken',
                'duration' => 7200,
                'peanuts' => -200,
                'experience_points' => 15,
                'image' => '.png'
            ],
            [
                'assignment_type_id' => 2,
                'skill_id' => 2,
                'entry_level_id' => 1,
                'title' => 'Boekhouding bijwerken.',
                'duration' => 18000,
                'peanuts' => 0,
                'experience_points' => 20,
                'image' => '.png'
            ],
            [
                'assignment_type_id' => 2,
                'skill_id' => 3,
                'entry_level_id' => 1,
                'title' => 'Computer cursus volgen.',
                'duration' => 14400,
                'peanuts' => 8585,
                'experience_points' => 8566,
                'image' => '.png'
            ],
            [
                'assignment_type_id' => 2,
                'skill_id' => 4,
                'entry_level_id' => 1,
                'title' => 'Logo maken.',
                'duration' => 3600,
                'peanuts' => 454545,
                'experience_points' => 54454,
                'image' => '.png'
            ]
            ,
            [
                'assignment_type_id' => 2,
                'skill_id' => 4,
                'entry_level_id' => 1,
                'title' => 'Testen.',
                'duration' => 5,
                'peanuts' => 10,
                'experience_points' => 5,
                'image' => '.png'
            ]
        ];
        
        //Create fake users and assign user_stats to them
        factory(User::class, 100)->create()->each(function($u) {
            DB::table('user_stats')->insert([
                'user_id' => $u->id,
                'created_at' => Carbon::now('Europe/Amsterdam')
            ]);;
        });
    
        //Insert default skills
        foreach($skills as $skill) {
            DB::table('skills')->insert(
                [
                    'title' => $skill,
                    'created_at' => Carbon::now('Europe/Amsterdam')
                ]
            );
        }
        
        //Insert default levels
        foreach($levels as $level) {
            DB::table('levels')->insert(
                [
                    'level' => $i,
                    'points_required' => $level,
                    'created_at' => Carbon::now('Europe/Amsterdam')
                ]
            );
            $i++;
        }
        
        //Assign skills to the users
        foreach(User::all() as $user)
        {
            foreach(Skills::all() as $skill)
            {
                DB::table('user_skills')
                    ->insert([
                        'user_id' => $user->id,
                        'skill_id' => $skill->id,
                        'created_at' => Carbon::now('Europe/Amsterdam')
                    ]);
            }
        }
        
        //Insert default entry levels
        foreach($entryLevels as $entryLevel)
        {
            DB::table('entry_levels')
                ->insert([
                    'title' => $entryLevel,
                    'created_at' => Carbon::now('Europe/Amsterdam')
                ]);
        }
        
        foreach($assignmentTypes as $assignmentType)
        {
            DB::table('assignment_types')
                ->insert([
                    'title' => $assignmentType,
                    'created_at' => Carbon::now('Europe/Amsterdam')
                ]);
        }
        
        foreach($assignments as $assignment)
        {
            DB::table('assignments')
                ->insert([
                    'assignment_type_id' => $assignment['assignment_type_id'] ,
                    'skill_id' => $assignment['skill_id'] ,
                    'entry_level_id' => $assignment['entry_level_id'] ,
                    'title' => $assignment['title'] ,
                    'duration' => $assignment['duration'] ,
                    'peanuts' => $assignment['peanuts'] ,
                    'experience_points' => $assignment['experience_points'] ,
                    'image' => $assignment['image'] ,
                    'created_at' => Carbon::now('Europe/Amsterdam')
                ]);
        }
    }
}
