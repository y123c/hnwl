<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create" style="margin:0 auto">

    <h1><?= Html::encode($this->title) ?></h1>
    <div id="conter" style="margin: 0 auto;width: auto; height: 2500px;">
        <div style="width: 1200px; height: 130px; margin: 0 auto;background-color: #f0ad4e">
            <table style="width:500px; height:120px;float: left;" border="0">
                <tr style="height: 20px;">
                    <td colspan="2" align="center"> <font color="red" size="5" > 1:</font><span style="color:#FF851B">运动方式</span></td>
                </tr>
                <tr style="height: auto;">
                    <td style="width: 350px;padding-left: 50px;">
                        <div style="width: 200px;height: 25px;">
                            <span style="float: left;width: 20px;"><input type="radio" class="radio"  name= "ydfs" value="ddd" checked="checked" ></span>
                            <span style="float: left">点到点</span>
                        </div>
                        <div style="width: 200px;height: 25px;">
                            <span style="float: left;width: 20px;"><input type="radio" class="radio"  name= "ydfs" value="sm"  style="float: left"></span>
                            <span style="float: left">扫__描</span>
                        </div>
                    </td>
                    <td style="width: 50%;">
                        <div id="div1" style="margin-left:20px; ">
                            <img  id="img_ydfs" src="<?php echo Url::to('@web/img/ydfs1.gif')?>" alt="" width="200" height="50" align="left"/>
                        </div>
                    </td>
                </tr>
            </table>
            <div style="width: 200px; height:120px;float: left"></div>
            <table style="width:500px; height:120px;float: left;" border="0">
                <tr>
                    <td colspan="2" align="center"><font color="red" size="5" > 2:</font><span style="color:#FF851B">动子数量</span></td>
                </tr>
                <tr>
                    <td style="width: 250px;">
                        动子数量：<input id="dzsl" class="txt" value="1"/>个
                    </td>
                    <td width="200">
                        <img  id="img_ydfs" src="img/dzsl.jpg" alt="" width="200" height="50" align="left"/>
                    </td>
                </tr>
            </table>
        </div>
        <div style="width: 1200px; height: 150px; margin: 0 auto;background-color:#fbeed5">
            <table style="width:500px; height:120px;float: left;" border="0">
                <tr style="height: 20px;">
                    <td colspan="2" align="center" > <font color="red" size="5" > 3:</font><span style="color:#FF851B">负载</span></td>
                </tr>
                <tr style="height: auto;">
                <tr>
                    <td width="250" align="left" style="padding-left: 5px">
                        负载重量：<input id="fzzl" class="txt" value="1" >kg<br/>
                        负载长度：<input id="fzcd" class="txt" value="180">mm<br/>
                        负载宽度：<input id="fzkd" class="txt" value="150">mm
                    </td>
                    <td width="200" align="center">
                        <img src="img/fz.jpg" width="200" height="100"/>
                    </td>
            </table>
            <div style="width: 200px; height:120px;float: left;"></div>
            <table style="width:500px; height:120px;float: left;" border="0">
                <tr>
                    <td colspan="2" align="center"><font color="red" size="5" > 4:</font><span style="color:#FF851B">行程</span></td>
                </tr>
                <tr>
                    <td style="width: 250px;height: 20px">
                        有效行程： <input id="xc" class="txt" value="1000"  maxlength="4"/>mm
                        <p style="line-height: 20px;padding-top: 10px">Ps:不参与VT曲线计算</p>
                    </td>
                    <td width="200" align="center">
                        <img src="img/gsc.jpg" width="200" height="100"/>
                    </td>
                </tr>
            </table>
        </div>
        <div style="width: 1200px; height: 150px; margin: 0 auto;">
            <table style="width:1200px; height:120px;float: left;background-color:#f8efc0" border="1">
                <tr>
                    <td colspan="3" align="center" valign="middle" ><font color="red" size="5" > 5:</font>速度</td>
                </tr>
                <tr>
                    <td  style="width: 400px;padding-left: 10px" colspan="2" align="left" valign="middle" id="td0" >
                        <p><font color="red"> 方式1：</font>
                            <input type="radio" class="radio" name="sd"  value="sj" checked="checked" style="float: left"/>
                        </p>
                        <p>
                        <input id="sdm1" class="txt"  value="10" style="width: 100px"/>
                        mm(毫米)用
                        <input id="sdm2" class="txt"  value="1" style="width: 100px"/>
                        s(秒)跑完，停留时间 ：
                        <input id="sdm3" class="txt"  value="0.1" style="width: 100px"/>
                        s(秒) ：<font color="#FF0000" >三角曲线</font>
                        <p>
                    </td>
                    <td width="280" align="center" valign="middle" >速度时间曲线图</td>
                </tr>
                <tr>
                    <td width="310" align="left" valign="top" id="td1" style="padding-left: 10px">
                        <p><font color="red"> 方式2：</font>
                            <input type="radio" class="radio" name="sd"  value="sdjsd" style="float: left" />
                            已知速度加速度
                        </p>
                        移动距离：
                        <input id="xxcc1" class="txt"  value="10"/>
                        mm(毫米)<br/>
                        速____度：
                        <input id="vel" class="txt"  value="1"/>
                        m/s(米/秒)<br/>
                        加_速_度：
                        <input id="acc" class="txt" value="10"/>
                        m/s² (米/方秒)<br/>
                        停留时间：
                        <input id="tmv" class="txt"  value="0.1"/>
                        s(秒)
                        <br>
                        <span id="tishi" style="color: red"></span>
                    </td>
                    <td width="310" align="left" valign="top" id="td2" style="padding-left: 10px">
                        <p><font color="red"> 方式3：</font>
                            <input type="radio" class="radio" name="sd" value="vt" style="float: left"/>
                            已知V-T曲线</p>
                        移动距离 &amp;s：
                        <input id="xxcc2" class="txt"  value="10"/>
                        mm(毫米)<br/>
                        加速时间 t1：
                        <input id="tm0" class="txt" value="0.5"/>
                        s(秒)<br/>
                        匀速时间 t2：
                        <input id="tm1" class="txt" value="0.5"/>
                        s (秒)<br/>
                        减速时间 t3：
                        <input id="tm2" class="txt"  value="0.5"/>
                        s (秒)<br/>
                        停留时间 t4：
                        <input id="tm3" class="txt"  value="1"/>
                        s(秒)
                    </td>
                    <td align="center" width="280">
                        <div id="main" style="width:280px;height:200px" ></div>
                    </td>
                </tr>
            </table><br/>
        </div>
        <div style="width: 1200px; height: 150px; margin: 0 auto;">
            <table style="width:1200px; height:120px;float: left;background-color:#EBECE9" border="1" >
                <tr>
                    <td colspan="3" align="center" valign="middle" ><font color="red" size="5" > 6:</font>精度</td>
                </tr>
                <tr style="background-color: #B5D1D8;">
                    <td width="500" align="left" valign="top" id="td3" style="padding-left: 10px;padding-top: 20px" >
                        <p><font color="red"> 方式1：</font>
                            <input type="radio" class="radio" name="jd"   value="cxdw" checked="checked"  style="float: left"/>
                            重现定位
                            (定位需大于等于重现精度)</p>
                        <p style="padding-bottom: 20px;line-height: 20px;">
                            <span style="float: left;margin-right: 5px">重现精度：±</span>
                            <span style="float: left;"><input id="cxjd" class="txt" value="1" />um (微米)
                            </span>
                        </p>
                        <p style="padding-top: 5px;line-height: 20px">
                            <span style="float: left;margin-right: 5px">定位精度：±</span>
                            <span style="float: left"><input id="dwjd" class="txt" value="3">um (微米)  </span>
                        </p>
                    </td>
                    <td width="400" align="left" valign="top" id="td4"style="padding-left: 20px;padding-top: 10px" >
                        <p><font color="red"> 方式2：</font>
                            <input type="radio" class="radio" name="jd" value="bmq" style="float: left "/>
                            编码器
                        </p>
                        <p> 光栅尺 (微米)um：</p>
                        <p> <span style="float: left;width: 20px;margin-left: 20px">
                                <input type="radio" class="radio" name="gsc" value="g10" checked="checked" />
                            </span>
                            <span style="float: left">1</span>
                            <span style="float: left;width: 20px;margin-left: 20px">
                                <input type="radio" class="radio" name="gsc" value="g05" />
                            </span>
                            <span style="float: left">0.5</span>
                            <span style="float: left;width: 20px;margin-left: 20px">
                                <input type="radio" class="radio" name="gsc" value="g01" />
                            </span>
                            <span style="float: left">0.1</span>
                            <br/>
                        </p>
                        <p> 磁栅尺 (微米)um：</p>
                        <p> <span style="float: left;width: 20px;margin-left: 20px">
                                <input type="radio" class="radio" name="gsc" value="c50" />
                            </span>
                            <span style="float: left">5</span>
                            <span style="float: left;width: 20px;margin-left: 20px">
                                <input type="radio" class="radio" name="gsc" value="c10" />
                            </span>
                            <span style="float: left">1</span>
                            <br/>
                        </p>
                    <td width="300" align="center" valign="middle" >
                        <img src="img/gsc.jpg" width="200" height="100"/>    </td>
                </tr>
            </table>
        </div>
        <div style="width: 1200px; height: 150px; margin: 0 auto;">
            <table style="width:500px; height:120px;float: left;" border="0">
                <tr style="height: 20px;">
                    <td colspan="2" align="center"> <font color="red" size="5" > 7:</font><span style="color:#FF851B">防尘装置</span></td>
                </tr>
                <tr style="height: auto;">
                    <td style="width: 350px;padding-left: 50px;">
                        <div style="width: 200px;height: 25px;">
                            <span style="float: left;width: 20px;"><input type="radio" class="radio" name="fczz"  value="wu" checked="checked" /></span>
                            <span style="float: left">无<br/></span>
                        </div>
                        <div style="width: 200px;height: 25px;">
                            <span style="float: left;width: 20px;"><input type="radio" class="radio" name="fczz"    value="gb" /></span>
                            <span style="float: left">金属盖板( 长度不能超过2米 )<br/></span>
                        </div>
                        <div style="width: 200px;height: 25px;">
                            <span style="float: left;width: 20px;"><input type="radio" class="radio" name="fczz" value="fqz" /></span>
                            <span style="float: left">风琴罩<br/></span>
                        </div>
                    </td>
                    <td style="width: 50%;">
                        <div id="div1" style="margin-left:20px; ">
                            <img  id="img_fczz"  name="fczz" src="img/fczz2.jpg" width="200" height="50" />
                        </div>
                    </td>
                </tr>
            </table>
            <div style="width: 200px; height:120px;float: left"></div>
            <table style="width:500px; height:120px;float: left" border="0">
                <tr>
                    <td colspan="2" align="center"><font color="red" size="5" > 8:</font><span style="color:#FF851B">安装方式</span></td>
                </tr>
                <tr>
                    <td style="width: 50%">
                        <p style="float: left;margin-right: 20px;width: 80px">
                            <input type="radio" class="radio" name="azfs" value="SP" checked="checked" style="float: left"/>水平
                        </p>
                        <p style="float: left;width: 80px">
                            <input type="radio" class="radio" name="azfs" value="DG" style="float: left"/>倒挂
                        </p>

                        <p style="float: left;margin-right: 20px;width: 80px">
                        <input type="radio" class="radio" name="azfs" value="CG" style="float: left"/> 侧挂
                        </p>
                        <p style="float: left;margin-right: 20px;width: 80px">
                        <input type="radio" class="radio" name="azfs" value="CZ" style="float: left"/> 垂直
                        </p>
                    </td>
                    <td style="width: 50%;">
                        <div id="div1" style="margin-left:20px; ">
                            <img id="img_azfs" src="img/azfs1.jpg" width="200" height="50"/>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div style="width: 1200px; height: 150px; margin: 0 auto;">
            <table style="width:500px; height:120px;float: left;" border="1">
                <tr style="height: 20px;">
                    <td colspan="2" align="center"> <font color="red" size="5" > 9:</font><span style="color:#FF851B">线缆长度</span></td>
                </tr>
                <tr style="height: auto;">
                    <td style="width: 350px;padding-left: 50px;">
                        <div style="width: 200px;height: 25px;">
                            <span style="float: left;width: 20px;"><input type="radio" class="radio" name="xlcd"   value="3m" checked="checked" /></span>
                            <span style="float: left">3m (米)<br /></span>
                        </div>
                        <div style="width: 200px;height: 25px;">
                            <span style="float: left;width: 20px;"><input type="radio" class="radio" name="xlcd"   value="5m"  /></span>
                            <span style="float: left"> 5m (米)<br/></span>
                        </div>

                    </td>
                    <td style="width: 50%;">
                        <div id="div1" style="margin-left:20px; ">
                            <img  id="img_xlcd" src="img/xlcd1.gif" alt="" width="200" height="50" align="left"/>
                        </div>
                    </td>
                </tr>
            </table>
            <div style="width: 200px; height:120px;float: left"></div>
            <table style="width:500px; height:120px;float: left" border="1">
                <tr>
                    <td colspan="2" align="center"><font color="red" size="5" > 10:</font><span style="color:#FF851B">拖链方向</span></td>
                </tr>
                <tr>
                    <td style="width: 50%">
                        <p style="float: left;margin-right: 20px;width: 80px">
                            <input type="radio" class="radio" name="azfs" value="SP" checked="checked" style="float: left;margin-left: 20px"/>水平
                        </p>
                        <p style="float: left;margin-right: 20px;width: 80px">
                            <input type="radio" class="radio" name="azfs" value="CZ" style="float: left"/> 垂直
                        </p>
                    </td>
                    <td style="width: 50%;">
                        <div id="div1" style="margin-left:20px; ">
                            <img src="img/tlfx1.jpg" alt="" width="200" height="50" id="img_tlfx"/>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div style="width: 1200px; height: auto; margin: 0 auto;">
            <table style="width: 1200px; height: 150px; margin: 0 auto;">
                <tr>
                    <td style="width: 1200px; height: 150px; margin: 0 auto;">
                        <button id="dwxx"  style="width:600px;height: 50px">点我选型 </button><button id="gwc" style="width: 600px;height: 50px">加入购物车 </button>
                    </td>
                </tr>
            </table>
            <table style="width: 1200px; height: 20px; margin: 0 auto;" border="1">
                <tr  style=" margin: 0 auto;">
                    <td width="200" height="20" align="center" valign="middle"  style=" margin: 0 auto;" >型号</td>
                    <td align="left" valign="middle"     style=" margin: 0 auto;" width="800">
                        首选型号<input id="rtn1" readonly="readonly"  style="width: 800px"/>
                        <span id="bz1" style="color: red;"></span><span id="sel11" style="display:none;">
                            <input id="we136" name="rtnss" type="radio" value="1" style="width: 800px">
                            宽度:136mm
                            <input id="we170" name="rtnss" type="radio" value="2" style="width: 800px" checked>宽度:170mm
                        </span> <br />
                        备选型号<input id="rtn2" readonly="readonly" style="width: 800px"/> <span id="bz2" style="color: red"></span>
                    </td>
                </tr>
            </table>
            <table width="900" style=" margin: 0 auto;">
                <tr>
                    <td width="447" align="left" >所需连续推力
                        <input id="ot1" />
                        N(牛)</td>
                    <td width="441" align="left" >马达连续推力
                        <input  id="ot5"/>
                        N(牛)</td>
                </tr>
                <tr>
                    <td align="left" >所需峰值推力
                        <input id="ot2" />
                        N(牛)</td>
                    <td align="left">马达峰值推力
                        <input  id="ot6"/>
                        N(牛)</td>
                </tr>
                <tr>
                    <td align="left" >所需连续电流
                        <input  id="ot3" />
                        A(安)</td>
                    <td align="left" >马达连续电流
                        <input  id="ot7"/>
                        A(安)</td>
                </tr>
                <tr>
                    <td align="left">所需峰值电流
                        <input  id="ot4"/>
                        A(安)</td>
                    <td align="left" >马达峰值电流
                        <input  id="ot8"/>
                        A(安)</td>
                </tr>
            </table>
            <table width="900"   style=" margin: 0 auto;">
                <tr>
                    <td width="81" align="left" >动子个数</td>
                    <td colspan="3" align="left" ><input id="ot101" />
                        PCS</td>
                </tr>
                <tr>
                    <td align="left" >负载</td>
                    <td colspan="3" align="left" ><input id="ot102" />
                        kg</td>
                </tr>
                <tr>
                    <td align="left" >行程</td>
                    <td colspan="3" align="left" ><input id="ot103" />
                        mm</td>
                </tr>
                <tr>
                    <td align="left" >速度</td>
                    <td width="226" align="left" ><input id="ot104" />
                        m/s</td>
                    <td width="286" align="left" >加速时间 t1：
                        <input id="ot1041" class="txt" value=""/>
                        s
                        (秒)</td>
                    <td width="291" align="left" >匀速时间 t2：
                        <input id="ot1042" class="txt" value=""/>
                        s (秒)</td>
                </tr>
                <tr>
                    <td align="left" >加速度</td>
                    <td align="left" ><input id="ot105" />
                        m/s²</td>
                    <td align="left" >减速时间 t3：
                        <input  class="txt" id="ot1043" value=""/>
                        s (秒)</td>
                    <td align="left" >停留时间 t4：
                        <input id="ot1044" class="txt"  value=""/>
                        s
                        (秒) </td>
                </tr>
                <tr>
                    <td align="left" >重现精度 ±</td>
                    <td colspan="3" align="left" ><input id="ot106" />
                        um
                    </td>
                </tr>
                <tr>
                    <td align="left" >定位精度 ±</td>
                    <td colspan="3" align="left" ><input id="ot107" />
                        um
                    </td>
                </tr>
                <tr>
                    <td align="left" >光栅分辨率</td>
                    <td colspan="3" align="left" ><input id="ot108" />
                        um
                    </td>
                </tr>
                <tr>
                    <td align="left" >开关型号</td>
                    <td colspan="3" align="left" ><input id="ot109" /></td>
                </tr>
                <tr>
                    <td align="left" >防尘方式</td>
                    <td colspan="3" align="left" ><input id="ot110" /></td>
                </tr>
                <tr>
                    <td align="left" >安装方式</td>
                    <td colspan="3" align="left" ><input id="ot111" /></td>
                </tr>
                <tr>
                    <td align="left" >线缆长度</td>
                    <td colspan="3" align="left" ><input id="ot112" />
                        m</td>
                </tr>
                <tr>
                    <td align="left" >拖链方向</td>
                    <td colspan="3" align="left" ><input id="ot113" /></td>
                </tr>
                <tr>
                    <td align="left" >材料</td>
                    <td colspan="3" align="left" ><input id="ot114" /></td>
                </tr>
                <tr>
                    <td align="left" >重量</td>
                    <td colspan="3" align="left" ><input id="ot115" /></td>
                </tr>

            </table>
            <table width="900" border="1"  style=" margin: 0 auto;" >
                <tr>
                    <td align="center" >
                        <img id="img_sn" src="img/lmt.png" width="800" height="300"/>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

