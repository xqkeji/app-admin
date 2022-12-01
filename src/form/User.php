<?php
return [
	'tab_form',
	'name'=>'user',
	[
		[
			'tab',
			'text'=>'基本信息',
			'name'=>'user_info',
			[
				'template'=>'row',
				'attr_class'=>'form-control',
				[	
					'text',
					'text'=>'用户名',
					'name'=>'username',
					'validators'=>[
						['required'],
					],
				],
				'password',
				'confirm_password',
				[	
					'text',
					'text'=>'姓名',
					'name'=>'fullname',
					'validators'=>[
						['required'],
					],
				],
				'switch',
				'roles',
			],
		],
		[
			'tab',
			'text'=>'授权信息',
			'name'=>'user_auth',
			[
				'template'=>'row',
				'attr_class'=>'form-control',
				'auth',
				'csrf',
			],
		],
	],
	'event'=>[
		'beforeBind'=>function($form){
			$controller=\xqkeji\App::getController();
			$actionName=$controller->getActionName();
			$data=$form->getData();
			
			if($actionName=='edit')
			{
				
				if(empty($data['password']))
				{
					unset($data['password']);
				}
				if(empty($data['confirm_password']))
				{
					unset($data['confirm_password']);
				}
			}
			if(!isset($data['status']))
			{
				$data['status']=0;
			}
			if(!isset($data['roles']))
			{
				$data['roles']=[];
			}
			if(!isset($data['auth']))
			{
				$data['auth']=[];
			}
			$form->setData($data);
		}
	],
];