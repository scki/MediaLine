<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m201205_094052_catalog_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rubrics}}', [
            'id' => $this->primaryKey(),
            'id_parent' => $this->integer(11),
            'name' => $this->char(255),
        ]);

        $this->createTable('{{%newses}}', [
            'id' => $this->primaryKey(),
            'title' => $this->char(255),
            'content' => $this->text(),
        ]);

        $this->createTable('{{%rubric_news}}', [
            'id' => $this->primaryKey(),
            'id_news' => $this->integer(11),
            'id_rubric' => $this->integer(11),
        ]);

        $this->addForeignKey(
            'rubric-parent_rubric',
            '{{%rubrics}}', 'id_parent',
            '{{%rubrics}}', 'id',
            'CASCADE', 'CASCADE'
        );
        $this->addForeignKey(
            'rubric_news-news',
            '{{%rubric_news}}', 'id_news',
            '{{%newses}}', 'id',
            'CASCADE', 'CASCADE'
        );
        $this->addForeignKey(
            'rubric_news-rubrics',
            '{{%rubric_news}}', 'id_rubric',
            '{{%rubrics}}', 'id',
            'CASCADE', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rubric_news}}');
        $this->dropTable('{{%rubrics}}');
        $this->dropTable('{{%newses}}');
    }
}
