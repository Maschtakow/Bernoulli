<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultView extends Migration
{
    public function up()
    {
        DB::statement("CREATE VIEW result AS
                        select `games`.`IdTeam` AS `IdTeam`,`futebol_app`.`teams`.`Team` AS `Team`,sum(`games`.`PTS`) AS `PTS`,sum(`games`.`J`) AS `J`,sum(`games`.`V`) AS `V`,sum(`games`.`E`) AS `E`,sum(`games`.`D`) AS `D`,sum(`games`.`GP`) AS `GP`,sum(`games`.`GC`) AS `GC`,sum(`games`.`SG`) AS `SG`
from ((select `futebol_app`.`games`.`IdHome` AS `IdTeam`,case when `futebol_app`.`games`.`GolsHome` > `futebol_app`.`games`.`GolsVisitor` then '3' when `futebol_app`.`games`.`GolsHome` = `futebol_app`.`games`.`GolsVisitor` then '1' when `futebol_app`.`games`.`GolsHome` < `futebol_app`.`games`.`GolsVisitor` then '0' else NULL end AS `PTS`,1 AS `J`,case when `futebol_app`.`games`.`GolsHome` > `futebol_app`.`games`.`GolsVisitor` then '1' else 0 end AS `V`,case when `futebol_app`.`games`.`GolsHome` = `futebol_app`.`games`.`GolsVisitor` then '1' else 0 end AS `E`,case when `futebol_app`.`games`.`GolsHome` < `futebol_app`.`games`.`GolsVisitor` then '1' else 0 end AS `D`,`futebol_app`.`games`.`GolsHome` AS `GP`,`futebol_app`.`games`.`GolsVisitor` AS `GC`,`futebol_app`.`games`.`GolsHome` - `futebol_app`.`games`.`GolsVisitor` AS `SG`,case when `futebol_app`.`games`.`GolsHome` > `futebol_app`.`games`.`GolsVisitor` then 'venceu' when `futebol_app`.`games`.`GolsHome` = `futebol_app`.`games`.`GolsVisitor` then 'empatou' when `futebol_app`.`games`.`GolsHome` < `futebol_app`.`games`.`GolsVisitor` then 'perdeu' else NULL end AS `total`
from `futebol_app`.`games` union select `futebol_app`.`games`.`IdVisitor` AS `IdTeam`,case when `futebol_app`.`games`.`GolsHome` < `futebol_app`.`games`.`GolsVisitor` then '3' when `futebol_app`.`games`.`GolsHome` = `futebol_app`.`games`.`GolsVisitor` then '1' when `futebol_app`.`games`.`GolsHome` > `futebol_app`.`games`.`GolsVisitor` then '0' else NULL end AS `PTS`,1 AS `J`,case when `futebol_app`.`games`.`GolsHome` < `futebol_app`.`games`.`GolsVisitor` then '1' else 0 end AS `V`,case when `futebol_app`.`games`.`GolsHome` = `futebol_app`.`games`.`GolsVisitor` then '1' else 0 end AS `E`,case when `futebol_app`.`games`.`GolsHome` > `futebol_app`.`games`.`GolsVisitor` then '1' else 0 end AS `D`,`futebol_app`.`games`.`GolsVisitor` AS `GP`,`futebol_app`.`games`.`GolsHome` AS `GC`,`futebol_app`.`games`.`GolsVisitor` - `futebol_app`.`games`.`GolsHome` AS `SG`,case when `futebol_app`.`games`.`GolsHome` < `futebol_app`.`games`.`GolsVisitor` then 'venceu' when `futebol_app`.`games`.`GolsHome` = `futebol_app`.`games`.`GolsVisitor` then 'empatou' when `futebol_app`.`games`.`GolsHome` > `futebol_app`.`games`.`GolsVisitor` then 'perdeu' else NULL end AS `total`
from `futebol_app`.`games`) `games` join `futebol_app`.`teams` on(`games`.`IdTeam` = `futebol_app`.`teams`.`IdTeam`))
group by `games`.`IdTeam`, `teams`.`Team`
order by sum(`games`.`PTS`) desc");
    }
    public function down()
    {
        DB::statement("DROP VIEW result");
    }
}
