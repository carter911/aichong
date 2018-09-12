<?php

namespace app\admin\controller;

use app\common\model\User as UserModel;
use app\common\controller\AdminBase;
use think\Config;
use think\Db;

/**
 * 用户管理
 * Class AdminUser
 * @package app\admin\controller
 */
class User extends AdminBase
{
	protected $user_model;

	protected function _initialize()
	{
		parent::_initialize();
		$this->user_model = new UserModel();

	}

	/**
	 * 用户管理
	 * @param string $keyword
	 * @param int $page
	 * @return mixed
	 */
	public function index($keyword = '', $page = 1)
	{
		$map = [];
		if ($keyword) {
			session('userkeyword', $keyword);
			$map['username|mobile|usermail'] = ['like', "%{$keyword}%"];
		} else {

			if (session('userkeyword') != '' && $page > 1) {
				$map['username|mobile|usermail'] = ['like', "%" . session('userkeyword') . "%"];

			} else {
				session('userkeyword', null);
			}
		}

		$user_list = $this->user_model->where($map)->order('id DESC')->paginate(10);
		return $this->fetch('index', ['user_list' => $user_list, 'keyword' => $keyword]);
	}

	public function toggle($id, $status, $name)
	{
		if ($this->request->isGet()) {

			if ($this->user_model->where('id', $id)->update([$name => $status]) !== false) {
				//  $this->success('更新成功');
				return json(array('code' => 200, 'msg' => '更新成功'));
			} else {
				// $this->error('更新失败');
				return json(array('code' => 0, 'msg' => '更新失败'));
			}
		}

	}

	/**
	 * 添加用户
	 * @return mixed
	 */
	public function add()
	{
		return $this->fetch();
	}


	public function in_user_add()
	{
		$user = self::auto_user();
		foreach ($user as $key => $val){
			$data = [
				'username' =>$val,
				'password'=>'chenrj123',
				'confirm_password'=>'chenrj123',
				'mobile'	=>'',
				'usermail'=>'10'.rand(1000,9999).$key.'@chenrj.com',
				'status'	=>1,
				'in_user' =>1,
			];
			$validate_result = $this->validate($data, 'User');
			if ($validate_result !== true) {
				// $this->error($validate_result);
				print_r($validate_result).'</br>';
				//return json(array('code' => 0, 'msg' => $validate_result));
			} else {

				$data['salt']     = generate_password(18);
				$data['password'] = md5($data['password'] . $data['salt']);
				$res = $this->user_model->allowField(true)->save($data);
				print_r($res);


			}
		}


	}

	/**
	 * 保存用户
	 */
	public function save()
	{
		if ($this->request->isPost()) {
			$data            = $this->request->post();
			$validate_result = $this->validate($data, 'User');

			if ($validate_result !== true) {
				// $this->error($validate_result);
				return json(array('code' => 0, 'msg' => $validate_result));
			} else {

				$data['salt']     = generate_password(18);
				$data['password'] = md5($data['password'] . $data['salt']);
				if ($this->user_model->allowField(true)->save($data)) {
					//$this->success('保存成功');
					return json(array('code' => 200, 'msg' => '添加成功'));
				} else {
					// $this->error('保存失败');
					return json(array('code' => 0, 'msg' => '添加失败'));
				}
			}
		}
	}

	/**
	 * 编辑用户
	 * @param $id
	 * @return mixed
	 */
	public function edit($id)
	{
		$user = $this->user_model->find($id);

		return $this->fetch('edit', ['user' => $user]);
	}

	/**
	 * 更新用户
	 * @param $id
	 */
	public function update($id)
	{
		if ($this->request->isPost()) {
			$data            = $this->request->param();
			$validate_result = $this->validate($data, 'User');

			if ($validate_result !== true) {
				//  $this->error($validate_result);
				return json(array('code' => 0, 'msg' => $validate_result));
			} else {
				$user            = $this->user_model->find($id);
				$user->id        = $id;
				$user->username  = $data['username'];
				$user->mobile    = $data['mobile'];
				$map['usermail'] = $data['email'];
				$map['id']       = ['neq', $id];
				$hasuserhead     = Db::name('user')->where($map)->count();
				if ($hasuserhead > 0) {
					return json(array('code' => 0, 'msg' => '邮箱重复'));
				}
				$user->usermail = $data['email'];

				if ($data['status'] == 0 && $user['status'] > 0) {
					$user->status = 0 - $user['status'];//等于 负的状态，当恢复时可以变为正数
				} else if ($data['status'] == 0 && $user['status'] <= 0) {

					//不变
				} else if ($data['status'] == 1 && $user['status'] > 0) {
					//不变
				} else {
					$user->status = 0 - $user['status'];
				}


				$user->point = $data['point'];

				if (!empty($data['password']) && !empty($data['confirm_password'])) {
					$user->password = md5($data['password'] . $user['salt']);
				}
				if ($user->save() !== false) {
					// $this->success('更新成功');
					return json(array('code' => 200, 'msg' => '更新成功'));
				} else {
					// $this->error('更新失败');
					return json(array('code' => 0, 'msg' => '更新失败'));
				}
			}
		}
	}

	/**
	 * 删除用户
	 * @param $id
	 */
	public function delete($id)
	{
		if ($this->user_model->destroy($id)) {
			//$this->success('删除成功');
			return json(array('code' => 200, 'msg' => '删除成功'));
		} else {
			// $this->error('删除失败');
			return json(array('code' => 0, 'msg' => '删除失败'));
		}
	}


	public static function auto_user()
	{
		return $user = [
			"一言不合就卖萌",
			"污霉味的小仙女",
			"讲道理我最可爱",
			"喵咕嘟",
			"媚态萌生",
			"种花兔",
			"每天都超可爱的",
			"媚态萌玍",
			"請把小熊还给我",
			"泥萌怪物",
			"小王子萌音",
			"老街兔",
			"不如潦草",
			"飞天小仙女",
			"萌萌的小确幸",
			"每天都超可爱の",
			"喵叽",
			"吧唧一口え宝妞",
			"贩卖可爱",
			"脸只能装可爱",
			"好吃的軟妹",
			"话少又软萌的仙女",
			"好吃软妹",
			"全网最萌打怪小能手",
			"手捧软喵",
			"可可莉丝",
			"凯蒂猫蝴蝶结",
			"養猫的萌妹",
			"萌阿萌网名集",
			"爱打盹的猫",
			"米朵喵",
			"最宝贝的宝贝",
			"四分萌气",
			"本宫略萌",
			"恶作劇小公主",
			"软萌娇羞学妹君",
			"常悠哉大王",
			"天花板上的猫",
			"喵吉欧尼酱",
			"[笑梨涡]",
			"睡午觉的喵儿",
			"混网萝",
			"帝级撒娇王",
			"皮卡丘不会跳舞",
			"头号可爱",
			"脸猫爱吃鱼",
			"兔牙战士",
			"酒窝上的奶油",
			"长颈鹿的棒棒糖",
			"肩头软猫",
			"咪咕猫",
			"稳妥一个萌妹儿",
			"塔塔猫",
			"羞稚",
			"元气土豆喵",
			"脸红派",
			"软妹快递",
			"小可爱1号",
			"萌面鹿",
			"喵呜的小耳朵",
			"本仙女是草莓味哒",
			"萌辣",
			"揽一身可爱ｖ",
			"诺贝尔可爱奖",
			"谜兔",
			"ミ蓝莓格格巫",
			"饭团萌霸爻",
			"想当龙的猫",
			"萌糯糯ing",
			"撒娇惯犯",
			"软喵酱メ",
			"呆梨小仙",
			"我方小仙女",
			"会掀被子的寿司·",
			"少女蒸汽机",
			"爱吃甜筒的猫",
			"毕傹我才⒊岁呀",
			"東方可爱",
			"塔普味的小仙女",
			"扛刀萝莉",
			"24Ｋ小公举",
			"放开那萌比",
			"喵小柒ミ是只喵",
			"小可爱的诗",
			"大脸猫花花",
			"偷吃美梦的厷举",
			"骄纵萝莉",
			"睡不醒的爱丽絲",
			"爱笑的智障猫",
			"海綿北鼻",
			"～超渣体质尐女呆",
			"软绒兎兒",
			"萌男我是软妹呀",
			"总萌大人",
			"迷倒一片喵",
			"鹿鹿的小奶包",
			"原味哆啦",
			"嘟嘟熊爱笑宝貝",
			"麋鹿小仙囡",
			"υ醋溜仙女肉",
			"萌美仁",
			"喵锅先森",
			"吐彩虹症",
			"栅栏下的折耳仙女",
			"萌度适中最好",
			"魔法少女喵",
			"小可爱的春天",
			"温柔大总攻",
			"来自软萌系",
			"不酷但很软",
			"兔叽妹妹的胡萝卜",
			"猫小九的蔷薇",
			"污界萌仙女",
			"仙女有对小翅膀",
			"长得乖ぃ该我歪",
			"智障小仙女",
			"(小可爱一米五)",
			"奶哟小仙女",
			"奶油味软萌",
			"玩网萌少女",
			"可爱公主萌",
			"软三岁",
			"Crazy萌杀",
			"暴走的neko酱",
			"油炸皮卡丘",
			"萌兔暖心糖",
			"吃味的猫",
			"萝莉捕猎人",
			"米幺 (喵)",
			"甜心小果奶",
			"鸡腿小仙女",
			"二货萌萌单妹子",
			"玫瑰se的纸小兔",
			"讨只软猫儿",
			"啵叽一下",
			"傲娇⒈个梦",
			"超级无敌小机智",
			"软酱萌音",
			"兔耳男神",
			"萌卷软糕",
			"茶丸喵",
			"呆萌可儿",
			"权萌萌的小仙女",
			"ㄨ甜蜜且乖",
			"电音软妹无敌萌啪啪啪!",
			"软趴趴的loli",
			"阿爸的小仙女",
			"长发小鹿纯",
			"穿粉红袜子的猫",
			"卷毛小桃子",
			"`光会卖萌",
			"足够可爱",
			"喵粉物语",
			"软酱奶糖",
			"我会放电啪啪",
			"软萌炸酱机",
			"逗猫惹草",
			"Q~果味小可爱->",
			"佡女味小野",
			"傻萌小学妹",
			"被我萌晕//▽//",
			"╭o楼上有只喵",
			"猫腻仙女抱*≧︶≦*",
			"熊抱啵儿",
			"萌子想做一颗冷太阳～の",
			"м·揪猫软妹",
			"＊生性太萌`",
			"挠心猫",
			"急红眼﹏的小兔子",
			";叫兔子的猫￣３￣",
			"啊绿酱Regina",
			"橘子喵有小小目标",
			"可爱`过分",
			"骄傲一点才可爱`",
			"阿喵の午休＾时间",
			"可爱指挥官＋▽＋",
			"ヽ别动-我有奥特蛋ノ",
			"熊扑奶团",
			"nn萌音酥甜◎",
			"o﹝〉﹏〈﹞o",
			"软甜啾咪",
			"啊哦小仙女~°ο°",
			"短腿猫不吃鱼cc",
			"松栗奶味的宅宝",
			"y幼软猫儿",
			"绿Σ茄子猫@",
			"别拽我萌萌的小耳朵^",
			"少年与猫喵",
			"圣代０圣代我是甜筒ˉ▽ˉ",
			"敲爱笑的小仙女",
			"兎耳男神",
			"(:此用户很可爱＞▂＜",
			"甜诱～少女喵Y",
			"1个萌草莓er",
			"甜猫储存室",
			"松栗奶哟°",
			"buling可爱多",
			"喵小呆c",
			"樱野猫少女@",
			"要甜死了",
			"０ㄟ沾点′软妹酱",
			"￡可爱￡侵袭症＋",
			"◣_小时可爱此时帅ゞ",
			"萝莉教头",
			"デ可爱型号0′ω`0",
			"ゆ小熊肉肉丶",
			"晕菜菜",
			"柠萌小丸子ヾ(^。^*)",
			"自幼可爱",
			"~甜死人不偿命￣３￣",
			"+ Σ有杀气的萝莉",
			"甜心猫宠女の",
			"#百分之百甜= 0 =",
			"〖狸哩亽喵〗",
			"草莓味萌软妹子咩！",
			"┑树与～阿喵┍",
			"仙女味TuT",
			"萌訫r",
			"一身～可爱风^３^",
			"牛奶煮软妹",
			"猫二妹=)●︿●",
			"软甜啾",
			"˙<傲娇的小碎步>˙",
			"软兔酒ˇの",
			"╰暴走的兔子╯",
			"o—>萌音草莓",
			"^ ~ ^奶味︴小魔女",
			"木有牙的兔纸",
			"可乐味的小阿萌",
			"、一护の喵咪ㄟ▔︹▔ㄟ",
			"可爱鬼",
			"萌音小软妹",
			"吃我一记▽可爱杀、@",
			"小短腿要早睡～。。",
			"归途也还可爱!",
			"橘子味的︴小宝贝≧o≦",
			"甜味少女趴",
			"天杀的可爱゛ν",
			"仙女味＞的＜小可耐●０●",
			"萌耳尐女）",
			"我才没有软喵症呢",
			"小学萌妹＞﹏＜",
			"全网最软妹",
			"中二魔仙",
			"本萝",
			"超污;小萌神.",
			"短发～丸子ㄟ▔＾▔ㄟ",
			"软妹的小情书",
			"软醉萌女",
			"调皮古怪还爱闹",
			"> c <‘最┇娇┇萌",
			"浪┑┏稚幼女心＝3＝",
			"幼懵少女",
			"要被吃掉哦",
			"一只兔球0 0",
			"长颈猫",
			"软妹蘑菇酱",
			"嘟醉",
			"萌心初动",
			":萌妹子不装萌>。ヘ",
			"猫耳朵胡同巷",
			"猫咚",
		];
	}
}