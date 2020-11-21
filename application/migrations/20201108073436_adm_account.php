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
      'status' => array(
              'type' => 'TINYINT',
              'default' => 0
      ),
    ));
    
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('adm_account');
          
  }

  public function down()
  {
          $this->dbforge->drop_table('adm_account');
  }
}