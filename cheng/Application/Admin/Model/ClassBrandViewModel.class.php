<?php
    namespace Admin\Model;
    use Think\Model\ViewModel;
    class ClassBrandViewModel extends ViewModel{
        public $viewFields=array(
			'b' => array('_table'=>'ds_brandtoclass','bid'),
			'c' => array('_table'=>'ds_classify','cid','cname','_on'=>'b.cid=c.cid'),
			);
    }