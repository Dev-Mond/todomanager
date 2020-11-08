<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Adm_account extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'created' => array(
                                'type' => 'TEXT',
                                'dafault' => 'CURRENT_TIMESTAMP'
                        ),
                        'updated' => array(
                                'type' => 'TEXT',
                                'dafault' => 'CURRENT_TIMESTAMP'
                        ),
                        'username' => array(
                                'type' => 'TEXT',
                                'null' => TRUE
                        ),
                        'password' => array(
                                'type' => 'TEXT',
                                'null' => TRUE
                        ),
                        'email' => array(
                                'type' => 'TEXT',
                                'null' => TRUE
                        ),
                        'rememberme' => array(
                                'type' => 'TINYINT',
                                'default' => 0
                        ),
                        'activated' => array(
                                'type' => 'TINYINT',
                                'default' => 0
                        ),
                ));
                
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->drop_table('adm_account', TRUE);
                $this->dbforge->create_table('adm_account');

                // Create procedures

                $AddAccount = "CREATE DEFINER=`root`@`localhost` PROCEDURE `AddAccount`(IN `p_username` TEXT, IN `p_password` TEXT) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER " .
                        "INSERT INTO adm_account (created, updated, username, password) VALUES (CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP(), p_username, p_password);";

                $GetAccount = "CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAccounts`() NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER SELECT * FROM adm_account;";

                $this->db->query("DROP PROCEDURE IF EXISTS `AddAccount`;");
                $this->db->query("DROP PROCEDURE  IF EXISTS `GetAccounts`;");

                $this->db->query($AddAccount);
                $this->db->query($GetAccount);
        }

        public function down()
        {
                $this->dbforge->drop_table('adm_account');
        }
}