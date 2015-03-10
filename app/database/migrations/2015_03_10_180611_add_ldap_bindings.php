<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLdapBindings extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		\DB::statement('CREATE VIEW `ldap_groups` (`id`, `name`, `description`)'
			. ' AS SELECT '
			. '(`groups`.`id` + 40000), `name`, `description` FROM `groups`;'
		);
        \DB::statement('CREATE VIEW `ldap_entries` (`id`, `dn`, `oc_map_id`, `parent`, `keyval`)'.
			' AS SELECT '
   				. '65535,"dc=studentrnd,dc=org", 2, 0, 1'
			. ' UNION SELECT '
				. '50001,"ou=People,dc=studentrnd,dc=org", 3, 65535, 50001'
			. ' UNION SELECT '
				. '50002,"ou=Groups,dc=studentrnd,dc=org", 3, 65535, 50002'
			. ' UNION SELECT '
				. '`userID`, concat("cn=",`username`,",ou=People,dc=studentrnd,dc=org"), 1, 50001, `userID` AS `x` FROM `users`'
			. ' UNION SELECT '
				. '(`id` + 40000), concat("cn=",`name`,",ou=Groups,dc=studentrnd,dc=org"), 4, 50002, (`id` + 40000) AS `x` FROM `groups`;'
		);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		\DB::statement('DROP VIEW `ldap_entries`;');
		\DB::statement('DROP VIEW `ldap_groups`;');
    }

}
