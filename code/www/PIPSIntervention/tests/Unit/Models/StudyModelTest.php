<?php

namespace Models;;

use Tests\TestCase;
use App\Models\Study;

class StudyModelTest extends TestCase
{
    public function test_getPISFilesAsHTMLListReturnsEmptyListWithNoFiles() {
        $model = new Study();
        $this->assertEquals('<ul></ul>', $model->getPISFilesAsHTMLList('pis'));;
    }

    public function test_getPISFilesAsHTMLListReturnsEmptyListWithBlankStringForFiles() {
        $model = new Study();
        $model->uploadedpis = '          ';
        $this->assertEquals('<ul></ul>', $model->getPISFilesAsHTMLList('pis'));;
    }

    public function test_getPISFilesAsHTMLListReturnsGoodListWithGoodFiles() {
        $model = new Study();
        $model->uploadedpis = 'fred.docx';
        $this->assertEquals('<ul><li><a href="pis/fred.docx" target="_blank">fred.docx</a></li></ul>', $model->getPISFilesAsHTMLList('pis'));;
        $model->uploadedpis = 'fred.docx  |   frank.docx';
        $this->assertEquals('<ul><li><a href="pis/fred.docx" target="_blank">fred.docx</a></li><li><a href="pis/frank.docx" target="_blank">frank.docx</a></li></ul>', $model->getPISFilesAsHTMLList('pis'));;
    }
}
