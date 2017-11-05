<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_base extends CI_Migration {

	public function up() {

		## Create Table cat_pro_relation
		$this->dbforge->add_field("`id` int(10) NOT NULL auto_increment primary key");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`pro_id` int(10) NOT NULL ");
		$this->dbforge->add_field("`cat_id` int(10) NOT NULL ");
		$this->dbforge->create_table("cat_pro_relation", TRUE);
		$this->db->query('ALTER TABLE  `cat_pro_relation` ENGINE = InnoDB');
		## Create Table np_categories
		$this->dbforge->add_field("`id` int(10) NOT NULL auto_increment primary key");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`cate_name` varchar(50) NOT NULL ");
		$this->dbforge->add_field("`cate_parent` int(10) NOT NULL ");
		$this->dbforge->add_field("`cate_active` tinyint(1) NOT NULL ");
		$this->dbforge->create_table("np_categories", TRUE);
		$this->db->query('ALTER TABLE  `np_categories` ENGINE = InnoDB');
		## Create Table np_products
		$this->dbforge->add_field("`id` int(10) NOT NULL auto_increment primary key");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`pro_name` varchar(50) NOT NULL ");
		$this->dbforge->add_field("`pro_details` varchar(100) NOT NULL ");
		$this->dbforge->add_field("`pro_price` float NOT NULL ");
		$this->dbforge->add_field("`pro_sku` varchar(10) NOT NULL ");
		$this->dbforge->add_field("`pro_images` varchar(500) NOT NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ");
		$this->dbforge->create_table("np_products", TRUE);
		$this->db->query('ALTER TABLE  `np_products` ENGINE = InnoDB');
		## Create Table np_review
		$this->dbforge->add_field("`id` int(10) NOT NULL auto_increment primary key");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`review_from` varchar(20) NOT NULL ");
		$this->dbforge->add_field("`pro_id` int(10) NOT NULL ");
		$this->dbforge->add_field("`comments` varchar(200) NOT NULL ");
		$this->dbforge->add_field("`ratings` int(1) NOT NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ");
		$this->dbforge->create_table("np_review", TRUE);
		$this->db->query('ALTER TABLE  `np_review` ENGINE = InnoDB');
		## Create Table np_users
		$this->dbforge->add_field("`id` int(10) NOT NULL auto_increment primary key");
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`username` varchar(10) NOT NULL ");
		$this->dbforge->add_field("`password` varchar(128) NOT NULL ");
		$this->dbforge->add_field("`firstname` varchar(10) NOT NULL ");
		$this->dbforge->add_field("`lastname` varchar(10) NOT NULL ");
		$this->dbforge->add_field("`role` varchar(10) NOT NULL ");
		$this->dbforge->create_table("np_users", TRUE);
		$this->db->query('ALTER TABLE  `np_users` ENGINE = InnoDB');

		//$this->db->query("INSERT INTO `np_users` (`id`, `username`, `password`, `firstname`, `lastname`, `role`) VALUES (1, \'admin\', \'7FCF4BA391C48784EDDE599889D6E3F1E47A27DB36ECC050CC92F259BFAC38AFAD2C68A1AE804D77075E8FB722503F3ECA2B2C1006EE6F6C7B7628CB45FFFD1D\', \'Sikander\', \'Masum', 'admin');"");
	 }

	public function down()	{
		### Drop table cat_pro_relation ##
		$this->dbforge->drop_table("cat_pro_relation", TRUE);
		### Drop table np_categories ##
		$this->dbforge->drop_table("np_categories", TRUE);
		### Drop table np_products ##
		$this->dbforge->drop_table("np_products", TRUE);
		### Drop table np_review ##
		$this->dbforge->drop_table("np_review", TRUE);
		### Drop table np_users ##
		$this->dbforge->drop_table("np_users", TRUE);

	}
}