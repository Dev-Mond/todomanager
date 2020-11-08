
defined('BASEPATH') OR exit('No direct script access allowed');

class <?='Migration_' .$className; ?> extends CI_Migration {

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
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->drop_table('<?=$tableName?>', TRUE);
                $this->dbforge->create_table('<?=$tableName?>');
        }

        public function down()
        {
                $this->dbforge->drop_table('<?=$tableName?>');
        }
}