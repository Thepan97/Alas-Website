<?php
$CI = get_instance();
$CI->load->database();
$CI->load->dbforge();

// bootcamp table
$table_1 = array(
	'id' => array(
		'type' => 'INT',
		'constraint' => 255,
		'unsigned' => TRUE,
		'auto_increment' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'owner_id' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'title' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'short_description' => array(
		'type' => 'MEDIUMTEXT',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'description' => array(
		'type' => 'LONGTEXT',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'category' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'start_date' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'faqs' => array(
		'type' => 'LONGTEXT',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'faq_descriptions' => array(
		'type' => 'LONGTEXT',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'requirements' => array(
		'type' => 'LONGTEXT',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'outcomes' => array(
		'type' => 'LONGTEXT',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'price' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'bootcamp_thumbnail' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'discount_flag' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'discounted_price' => array(
		'type' => 'DOUBLE',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'expiry_period' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'collation' => 'utf8_unicode_ci'
	),
	'number_of_month' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'meta_keywords' => array(
		'type' => 'MEDIUMTEXT',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'meta_description' => array(
		'type' => 'LONGTEXT',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'is_free' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'added_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'updated_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	)
);

// bootcamp category table
$table_2 = array(
	'id' => array(
		'type' => 'INT',
		'constraint' => 255,
		'unsigned' => TRUE,
		'auto_increment' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'category_name' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'added_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'updated_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	)
);

// bootcamp live class
$table_3 = array(
	'id' => array(
		'type' => 'INT',
		'constraint' => 255,
		'unsigned' => TRUE,
		'auto_increment' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'module_id' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'bootcamp_id' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'title' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'description' => array(
		'type' => 'LONGTEXT',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'class_schedule' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'estimated_time' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'status' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'order_by' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'added_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'updated_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	)
);

// bootcamp module table
$table_4 = array(
	'id' => array(
		'type' => 'INT',
		'constraint' => 255,
		'unsigned' => TRUE,
		'auto_increment' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'bootcamp_id' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'title' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'order_by' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'restricted_by' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'class_start' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'class_end' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'added_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'updated_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	)
);

// bootcamp online class table
$table_5 = array(
	'id' => array(
		'type' => 'INT',
		'constraint' => 255,
		'unsigned' => TRUE,
		'auto_increment' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'owner_id' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'bootcamp_id' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'live_class_id' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'room_name' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'link' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'pass' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'status' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'schedule' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'added_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'updated_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	)
);

// bootcamp purchase table
$table_6 = array(
	'id' => array(
		'type' => 'INT',
		'constraint' => 255,
		'unsigned' => TRUE,
		'auto_increment' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'user_id' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'bootcamp_id' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'price' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'payment_method' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'request_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'added_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'updated_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	)
);

// bootcamp resource table
$table_7 = array(
	'id' => array(
		'type' => 'INT',
		'constraint' => 255,
		'unsigned' => TRUE,
		'auto_increment' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'class_id' => array(
		'type' => 'INT',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'resource' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'type' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'added_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	),
	'updated_date' => array(
		'type' => 'VARCHAR',
		'constraint' => '255',
		'default' => null,
		'null' => TRUE,
		'collation' => 'utf8_unicode_ci'
	)
);

$tables = [
	'bootcamp' => $table_1,
	'bootcamp_category' => $table_2,
	'bootcamp_live_class' => $table_3,
	'bootcamp_modules' => $table_4,
	'bootcamp_online_class' => $table_5,
	'bootcamp_purchase' => $table_6,
	'bootcamp_resources' => $table_7,
];

foreach ($tables as $key => $item) {
	$CI->dbforge->add_field($item);
	$CI->dbforge->add_key('id', TRUE);
	$attributes = array('collation' => "utf8_unicode_ci");
	$CI->dbforge->create_table($key, TRUE);
}
