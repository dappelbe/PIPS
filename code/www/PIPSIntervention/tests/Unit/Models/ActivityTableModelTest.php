<?php

use Tests\TestCase;
use App\Models\ActivityTable;
use App\Models\Enums\ActivityTableEnums;

class ActivityTableModelTest extends TestCase
{

    public function testStoreMyActivity_Logs_an_error_with_an_empty_pageName() : void {
        $pageName = '';
        $comment = 'comment';
        $actual = ActivityTable::StoreMyActivity($pageName, $comment);
        $this->assertEquals(ActivityTableEnums::EmptyPageName, $actual);
    }

    public function testStoreMyActivity_Logs_an_error_with_an_empty_comment() : void {
        $pageName = 'Page Name';
        $comment = '';
        $actual = ActivityTable::StoreMyActivity($pageName, $comment);
        $this->assertEquals(ActivityTableEnums::EmptyComment, $actual);
    }

    public function StoreMyActivity_returnsAllOk() {
        $pageName = 'Page Name';
        $comment = 'Comment';
        $actual = ActivityTable::StoreMyActivity($pageName, $comment);
        $this->assertEquals(ActivityTableEnums::AllOK, $actual);

    }
}
