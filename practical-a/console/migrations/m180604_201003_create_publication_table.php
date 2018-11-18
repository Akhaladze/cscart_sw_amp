<?php

use yii\db\Migration;

/**
 * Handles the creation of table `publication`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m180604_201003_create_publication_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('publication', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique(),
            'description' => $this->string(),
            'description_seo' => $this->string(),
            'title_seo' => $this->string(),
            'keywords_seo' => $this->string(),
            'lang' => $this->string()->defaultValue('ru'),
            'is_primary' => $this->integer(1)->defaultValue(1),
            'user_id' => $this->integer(),
            'image_id' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-publication-user_id',
            'publication',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-publication-user_id',
            'publication',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-publication-user_id',
            'publication'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-publication-user_id',
            'publication'
        );

        $this->dropTable('publication');
    }
}
