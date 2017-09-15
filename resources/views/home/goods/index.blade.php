<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title>商品页面</title>

        <link href="/h/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
        <link href="/h/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
        <link href="/h/basic/css/demo.css" rel="stylesheet" type="text/css" />
        <link type="text/css" href="/h/css/optstyle.css" rel="stylesheet" />
        <link type="text/css" href="/h/css/style.css" rel="stylesheet" />

        <script type="text/javascript" src="/h/basic/js/jquery-1.7.min.js"></script>
        <script type="text/javascript" src="/h/basic/js/quick_links.js"></script>

        <script type="text/javascript" src="/h/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
        <script type="text/javascript" src="/h/js/jquery.imagezoom.min.js"></script>
        <script type="text/javascript" src="/h/js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="/h/js/list.js"></script>

    </head>

    <body>
<!--顶部导航条 -->
<div class="hmtop">
            <!--顶部导航条 -->
            <div class="am-container header">
                <ul class="message-l">
                    <div class="topMessage">
                        <div class="menu-hd">
                            @if(session('user'))
                            <a href="javascript:;" target="_top" class="h">欢迎您,{{ session('user')['username'] }}</a>
                            <a href="{{ url('home/login/logout') }}" target="_top">[退出]</a>
                            @else
                            <a href="{{ url('home/login') }}" target="_top" class="h">亲，请登录</a>
                            <a href="{{ url('home/regist') }}" target="_top">免费注册</a>
                            @endif
                        </div>
                    </div>
                </ul>
                <ul class="message-r">
                    <div class="topMessage home">
                        <div class="menu-hd"><a href="{{ url('/') }}" target="_top" class="h">商城首页</a></div>
                    </div>
                    <div class="topMessage my-shangcheng">

                        <div class="menu-hd MyShangcheng"><a href="{{ url('/user/center') }}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>

                    </div>
                    <div class="topMessage mini-cart">
                        
                    </div>
                    <div class="topMessage favorite">
                       
                </ul>
                </div>

                <!--悬浮搜索框-->

                <div class="nav white">

                    <div class="logo"><img src="/h/images/logo-search.png" /></div>
                    <div class="logoBig">
                        <li><img src="/h/images/logo-search.png" /></li>

                    </div>

                    <div class="search-bar pr">
                        <a name="index_none_header_sysc" href="/h/#"></a>
                        <form method='get' action='/search'>
                        
                            <input id="searchInput" name="search" type="text" placeholder="搜索商品" autocomplete="off" value="{{$request['search'] or ''}}">
                            <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
                        </form>
                    </div>
                </div>

                <div class="clear"></div>
            </div>

            <div class="clear"></div>
            <b class="line"></b>
            <div class="listMain">

    <div class="nav-table">
                       <div class="long-title"><span class="all-goods">全部分类</span></div>
                       <div class="nav-cont">
                            <ul>
                                <li class="index"><a href="{{ url('/') }}">首页</a></li>
                                <li class="qc"><a href="/search/5">二手手机</a></li>
                                <li class="qc"><a href="/search/5">二手火箭</a></li>
                                <li class="qc"><a href="/home/goods/create">发布闲置</a></li>
                                <li class="qc last"><a href="/pay/sell">我的闲置</a></li>
                            </ul>

                        </div>
            </div>

                <!--分类-->
                <ol class="am-breadcrumb am-breadcrumb-slash">
                    <li><a href="/h/#">首页</a></li>
                    <li><a href="/h/#">分类</a></li>
                    <li class="am-active">内容</li>
                </ol>
                <script type="text/javascript">
                    $(function() {});
                    $(window).load(function() {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            start: function(slider) {
                                $('body').removeClass('loading');
                            }
                        });
                    });
                </script>
                <div class="scoll">
                    <section class="slider">
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    <img src="" title="pic" />
                                </li>
                                <li>
                                    <img src="/h/images/02.jpg" />
                                </li>
                                <li>
                                    <img src="/h/images/03.jpg" />
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>

                <!--放大镜-->

                <div class="item-inform">
                    <div class="clearfixLeft" id="clearcontent">

                        <div class="box">
                            
                            <div class="tb-booth tb-pic tb-s310">
                                <a href="/h/images/01.jpg"><img src="/{{ $goods->pic }}" alt="细节展示放大镜特效" rel="/h/images/01.jpg" class="jqzoom" /></a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="clearfixRight">

                        <!--规格属性-->
                        <!--名称-->
                        <div class="tb-detail-hd">
                            <h1>{{ $goods->title }}</h1>
                        </div>
                        <div class="tb-detail-list">
                            <!--价格-->
                            <div class="tb-detail-price">
                                <li class="price iteminfo_price">
                                    <dt>售价</dt>
                                    <dd><em>¥</em><b class="sys_item_price">{{ $goods->reprice }}</b>  </dd>                                 
                                </li>
                                <li class="price iteminfo_mktprice">
                                    <dt>原价</dt>
                                    <dd><em>¥</em><b class="sys_item_mktprice">{{ $goods->price }}</b></dd>                                   
                                </li>
                                <div class="clear"></div>
                            </div>

                            <!--地址-->
                            <br>
                            <div class="clear"></div>

                            <!--销量-->
                            <ul class="tm-ind-panel">
                                <li class="tm-ind-item tm-ind-sellCount canClick">
                                    <div class="tm-indcon"><span class="tm-label">月销量</span><span class="tm-count">1015</span></div>
                                </li>
                                <li class="tm-ind-item tm-ind-sumCount canClick">
                                    <div class="tm-indcon"><span class="tm-label">累计销量</span><span class="tm-count">6015</span></div>
                                </li>
                                <li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
                                    <div class="tm-indcon"><span class="tm-label">累计评价</span><span class="tm-count">640</span></div>
                                </li>
                            </ul>
                            <div class="clear"></div>
                            <br>

                            <!--各种规格-->
                            <dl class="iteminfo_parameter sys_item_specpara">
                                <dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
                                <dd>
                                    <!--操作页面-->

                                    <div class="theme-popover-mask"></div>

                                    <div class="theme-popover">
                                        <div class="theme-span"></div>
                                        <div class="theme-poptit">
                                            <a href="/h/javascript:;" title="关闭" class="close">×</a>
                                        </div>
                                        <div class="theme-popbod dform">
                                            <form class="theme-signin" name="loginform" action="" method="post">

                                                <div class="theme-signin-left">

                                                    <div class="theme-options">
                                                        <div class="cart-title">成色</div>
                                                        <ul>
                                                            <li class="sku-line">{{ $goods->condition }}<i></i></li>
                                                           
                                                        </ul>
                                                    </div>
                                                    <br>
                                                    <div class="theme-options">
                                                        <div class="cart-title number">数量</div>
                                                        <dd>
                                                            <input id="min" class="am-btn am-btn-default" name="" type="button" value="-" />
                                                            <input id="text_box" name="" type="text" value="1" style="width:30px;" />
                                                            <input id="add" class="am-btn am-btn-default" name="" type="button" value="+" />
                                                            <span id="Stock" class="tb-hidden">库存<span class="stock">{{ $goods->num }}</span>件</span>
                                                        </dd>

                                                    </div>
                                                    <div class="clear"></div>

                                                    <div class="btn-op">
                                                        <div class="btn am-btn am-btn-warning">确认</div>
                                                        <div class="btn close am-btn am-btn-warning">取消</div>
                                                    </div>
                                                </div>
                                                <div class="theme-signin-right">
                                                    <div class="img-info">
                                                        <img src="/h/images/songzi.jpg" />
                                                    </div>
                                                    <div class="text-info">
                                                        <span class="J_Price price-now">¥39.00</span>
                                                        <span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>

                                </dd>
                            </dl>
                            <div class="clear"></div>
                            <!--活动  -->
                            <div class="shopPromotion gold">
                                <div class="hot">
                                    <dt class="tb-metatit">店铺优惠</dt>
                                    <div class="gold-list">
                                        <p>本商品暂无打折优惠活动<span><i class="am-icon-sort-down"></i></span></p>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>

                        <div class="pay">
                            <div class="pay-opt">
                            <a href="/h/home.html"><span class="am-icon-home am-icon-fw">首页</span></a>
                            <a><span class="am-icon-heart am-icon-fw">收藏</span></a>
                            
                            </div>
                            <li>
                                <div class="clearfix tb-btn tb-btn-buy theme-login">
                                    <a id="LikBuy" title="点此按钮到下一步确认购买信息" href="{{url('pay?id='.$goods['id'])}}">立即购买</a>
                                </div>
                            </li>
                            <li>
                                @if(empty($status) || $status == 0)
                                <div class="clearfix tb-btn tb-btn-basket theme-login">
                                    <a id="LikBasket" title="加入收藏" href="/home/collection/{{ $goods->id }}"><i></i>加入收藏</a>
                                </div>
                                @else
                                <div class="clearfix tb-btn tb-btn-basket theme-login">
                                    <a id="LikBasket" title="取消收藏" href="/home/collection/{{ $goods->id }}"><i></i>取消收藏</a>
                                </div>
                                @endif
                            </li>
                        </div>
                    </div>
                    <div class="clear"></div>

                </div>
                <div class="clear"></div>
                 <!-- introduce-->
                <div class="introduce">
                    <div class="browse">
                        <div class="mc"> 
                             <ul>                       
                                <div class="mt">            
                                    <h2>看了又看</h2>        
                                </div>
                                
                                                             
                                  <li>
                                    <div class="p-img">                    
                                        <a  href="/h/#"> <img class="" src="/h/images/browse1.jpg"> </a>               
                                    </div>
                                    <div class="p-name"><a href="/h/#">
                                        【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
                                    </a>
                                    </div>
                                    <div class="p-price"><strong>￥35.90</strong></div>
                                  </li>                               
                                  <li>
                                    <div class="p-img">                    
                                        <a  href="/h/#"> <img class="" src="/h/images/browse1.jpg"> </a>               
                                    </div>
                                    <div class="p-name"><a href="/h/#">
                                        【三只松鼠_开口松子218g】零食坚果特产炒货东北红松子原味
                                    </a>
                                    </div>
                                    <div class="p-price"><strong>￥35.90</strong></div>
                                  </li>                               
                                <li>
                                    <div class="p-img">                    
                                        <a  href="/h/#"> <img class="" src="/h/images/browse1.jpg"> </a>               
                                    </div>
                                    <div class="p-name"><a href="/h/#">
                                        【三只松鼠_开口松子218g】零食坚果特产炒货东北红松子原味
                                    </a>
                                    </div>
                                    <div class="p-price"><strong>￥35.90</strong></div>
                                  </li>  
                             </ul>                  
                        </div>
                    </div>
                    <div class="introduceMain">
                        <div class="am-tabs" data-am-tabs>
                            <ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
                                <li class="am-active">
                                    <a href="/h/#">

                                        <span class="index-needs-dt-txt">宝贝详情</span></a>

                                </li>

                                <li>
                                    <a href="/h/#">

                                        <span class="index-needs-dt-txt">全部评价</span></a>

                                </li>

                                <li>
                                    <a href="/h/#">

                                        <span class="index-needs-dt-txt">我要评价</span></a>
                                </li>
                            </ul>

                            <div class="am-tabs-bd">

                                <div class="am-tab-panel am-fade am-in am-active">
                                    <div class="J_Brand">

                                        <div class="attr-list-hd tm-clear">
                                            <h4>产品描述：</h4></div>
                                        <div class="clear"></div>
                                        <ul id="J_AttrUL">
                                            <li title="">{{ $goods->intro }}</li>
                                        </ul>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="details">
                                        <div class="attr-list-hd after-market-hd">
                                            <h4>商品细节</h4>
                                        </div>
                                       
                                        <div class="twlistNews">
                                            <!-- //这里是详情图片 -->
                                            
                                            <img src="/{{ $info['pic1'] }}" />
                                            <img src="/{{ $info['pic2'] }}" />
                                            <img src="/{{ $info['pic3'] }}" />
                                            <img src="/{{ $info['pic4'] }}" />
                                            <img src="/{{ $info['pic5'] }}" />
                                            <img src="/{{ $info['pic6'] }}" />
                                            <img src="/{{ $info['pic7'] }}" />
                                            <img src="/{{ $info['pic8'] }}" />
                                            <img src="/{{ $info['pic9'] }}" />
                                           
                                            
                                        </div>
                                    </div>
                                    <div class="clear"></div>

                                </div>

                                <div class="am-tab-panel am-fade">
                                    <div class="clear"></div>
                                    <div class="tb-r-filter-bar">
                                        <ul class=" tb-taglist am-avg-sm-4">
                                            <li class="tb-taglist-li tb-taglist-li-current">
                                                <div class="comment-info">
                                                    <span>全部评价</span>
                                                    <span class="tb-tbcr-num">&nbsp;&nbsp;{{$num}}</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clear"></div>
                                     @foreach($data as $k=>$v)
                                    <ul class="am-comments-list am-comments-list-flip">
                                        <li class="am-comment">
                                            <!-- 评论容器 -->
                                            <a href="/h/">
                                                <img class="am-comment-avatar" src="/h/images/hwbn40x40.jpg" />
                                                <!-- 评论者头像 -->
                                            </a>

                                            <div class="am-comment-main">
                                                <!-- 评论内容容器 -->
                                                <header class="am-comment-hd">
                                                    <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                    <div class="am-comment-meta">
                                                        <!-- 评论元数据 -->
                                                        <a href="/h/#link-to-user" class="am-comment-author">{{ $v->uid }}</a>
                                                        <!-- 评论者 -->
                                                        评论于
                                                        <time datetime="">{{$v->time}}</time>
                                                    </div>
                                                </header>

                                                <div class="am-comment-bd">
                                                    <div class="tb-rev-item " data-id="255776406962">
                                                        <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                           {{$v->content}}
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- 评论内容 -->
                                            </div>
                                        </li>
                                    </ul>
                                    @endforeach
                                    <div class="clear"></div>

                                    <div class="clear"></div>
                                    
                                    <br>

                                    <div class="tb-reviewsft">
                                        <div class="tb-rate-alert type-attention">购买前请查看该商品的 <a href="/h/#" target="_blank">购物保障</a>，明确您的售后保障权益。</div>
                                    </div>

                                </div>
        
                                <div class="am-tab-panel am-fade">
                                    <div class="clear"></div>

                                    <!--分页 -->
                                    <!-- 猜你喜欢部分 -->
                            <form class="am-form am-form-horizontal" action="{{ url('home/comment') }}" method="post" id="slide_form" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @if (count($errors) > 0)
                                    <div style="color:red; border:1px gray dashed; cursor:pointer" onclick="$(this).hide()">
                                      添加失败
                                        <ul>
                                          @if(is_object($errors))
                                            @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                            @endforeach
                                          @else
                                            <li>{{ $errors }}</li>
                                          @endif
                                        </ul>
                                    </div>
                                @endif

                                <div class="item-comment">
                                    <textarea name="content" placeholder="请写下对宝贝的感受吧，对他人帮助很大哦！"></textarea>
                                    <input type="hidden" name="uid" value="{{ $uid }}">
                                    <input type="hidden" name="rid" value="{{ $goods->uid }}">
                                    <input type="hidden" name="gid" value="{{ $goods->id }}">
                                </div>

                                <br><br><br><br><br><br><br><br><br><br><br>                                <br>
                                
                                <div class="info-btn">
                                    <input type="submit" style="height:40px" align="center" value="添加评论">
                                </div>

                                    <div class="clear"></div>
                            </form>

                                </div>

                            </div>

                        </div>
                        <div class="footer">
                            <div class="footer-hd">
                                <p>
                                    <a href="#">恒望科技</a>
                                    <b>|</b>
                                    <a href="#">商城首页</a>
                                    <b>|</b>
                                    <a href="#">支付宝</a>
                                    <b>|</b>
                                    <a href="#">物流</a>
                                </p>
                            </div>
                            <div class="footer-bd">
                                <p>
                                    <a href="#">关于恒望</a>
                                    <a href="#">合作伙伴</a>
                                    <a href="#">联系我们</a>
                                    <a href="#">网站地图</a>
                                    <em>© 2015-2025 Hengwang.com 版权所有</em>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--菜单 -->
            <div class=tip>
                <div id="sidebar">
                </div>
                <div id="prof-content" class="nav-content">
                    <div class="nav-con-close">
                        <i class="am-icon-angle-right am-icon-fw"></i>
                    </div>
                    <div>
                        我
                    </div>
                </div>
                <div id="shopCart-content" class="nav-content">
                    <div class="nav-con-close">
                        <i class="am-icon-angle-right am-icon-fw"></i>
                    </div>
                    <div>
                        购物车
                    </div>
                </div>
                <div id="asset-content" class="nav-content">
                    <div class="nav-con-close">
                        <i class="am-icon-angle-right am-icon-fw"></i>
                    </div>
                    <div>
                        资产
                    </div>

                    <div class="ia-head-list">
                        <a href="/h/#" target="_blank" class="pl">
                            <div class="num">0</div>
                            <div class="text">优惠券</div>
                        </a>
                        <a href="/h/#" target="_blank" class="pl">
                            <div class="num">0</div>
                            <div class="text">红包</div>
                        </a>
                        <a href="/h/#" target="_blank" class="pl money">
                            <div class="num">￥0</div>
                            <div class="text">余额</div>
                        </a>
                    </div>

                </div>
                <div id="foot-content" class="nav-content">
                    <div class="nav-con-close">
                        <i class="am-icon-angle-right am-icon-fw"></i>
                    </div>
                    <div>
                        足迹
                    </div>
                </div>
                <div id="brand-content" class="nav-content">
                    <div class="nav-con-close">
                        <i class="am-icon-angle-right am-icon-fw"></i>
                    </div>
                    <div>
                        收藏
                    </div>
                </div>
                <div id="broadcast-content" class="nav-content">
                    <div class="nav-con-close">
                        <i class="am-icon-angle-right am-icon-fw"></i>
                    </div>
                    <div>
                        充值
                    </div>
                </div>
            </div>
    </body>
</html>