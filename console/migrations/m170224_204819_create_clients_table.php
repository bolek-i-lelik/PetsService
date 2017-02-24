<?php

use yii\db\Migration;

/**
 * Handles the creation of table `clients`.
 */
class m170224_204819_create_clients_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%clients}}', [
            'id' => $this->primaryKey(),
            'clinic_id' => $this->integer()->notNull()->comment('идентификатор клиники'),
            'familia' => $this->string()->notNull()->comment('Фамилия владельца'),
            'name' => $this->string()->notNull()->comment('имя владельца'),
            'father' => $this->string()->comment('Отчество владельца'),
            'passport' => $this->string()->comment('Номер паспорта владельца'),
            'adress' => $this->string()->comment('Адрес владельца'),
            'pets_name' => $this->string()->comment('Кличка питомца'),
            'phone' => $this->string()->notNull()->comment('Телефон владельца'),
            'email' => $this->string()->comment('email владельца'),
            'pets_social_account' => $this->string()->comment('логин в социальной сети PetSocial'),
            'chip' => $this->string()->comment('Номер чипа'),
            'vid' => $this->string()->comment('Вид питомца'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%clients}}');
    }
}
