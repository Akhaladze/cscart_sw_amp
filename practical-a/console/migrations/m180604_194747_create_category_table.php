<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */

class m180604_194747_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    
    public function Up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(),
            'description_seo' => $this->string(),
            'title_seo' => $this->string(),
            'keywords_seo' => $this->string(),
            'lang' => $this->string()->defaultValue('ru'),
            'is_parent' => $this->integer(1)->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('category');
    }
}
