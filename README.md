### 登录模块
---
>1. 登录
---
URLhttp://www.tp5.com/index.php/api/user/login?username=admin&pwd=123456

参数 |是否必须 | 说明
---|---|---
username：admin|无|无
password：123456|无|无


### 首页模块
---
> 1. 首页
---
>URL:http://www.tp5.com/index.php/api/user/banner

>方式：POST

参数 |是否必须 | 说明
---|---|---
无|无|无
无|无|无


---
> 2. 秒杀商品
---
>URL:http://www.tp5.com/index.php/api/user/seckill

>方式：POST

参数 |是否必须 | 说明
---|---|---
无|无|无
无|无|无

```
{
    "data": {
        "total": 5,
        "rows": [
            {
                "allPrice": 50,
                "pointPrice": 30,
                "iconUrl": "https://www.baidu.com/img/bd_logo1.png",
                "timeLeft": 50,
                "type": 1,
                "productId": 3
            }
        ]
    },
    "success": true,
    "errorMsg": "成功"
}
```

---

> 3. 猜你喜欢

---
>URL:http://www.tp5.com/index.php/api/user/getYourFav

参数 |是否必须 | 说明
---|---|---
id|是|用户id

```
{
    "data": {
        "total": 2,
        "rows": [
            {
                "price": 50,
                "name": "商品名称",
                "iconUrl": "商品图片",
                "productId": 3
            }
        ]
    },
    "success": true,
    "errorMsg": "成功"
}

```

---

> 4.分类列表

---

>URL:http://127.0.0.1:99/index.php/api/user/category?parent_id=1


参数 |是否必须 | 说明
---|---|---


```
{
    "data": [
        {
            "id": 2,
            "tree": 0,
            "lft": 8,
            "rgt": 11,
            "depth": 1,
            "name": "冰箱",
            "parent_id": 1,
            "intro": null
        },
        {
            "id": 7,
            "tree": 0,
            "lft": 2,
            "rgt": 7,
            "depth": 1,
            "name": "空调",
            "parent_id": 1,
            "intro": "空调空调空调空调空调空调"
        }
    ],
    "success": true,
    "errorMsg": "成功"
}
```

---

> 5. 品牌列表
---

>URL:http://www.tp5.com/index.php/api/user/brand

参数 |是否必须 | 说明
---|---|---
无|无|无

```
{
    "data": [
        {
            "id": 1,
            "name": "品牌名称"
        }
    ],
    "success": true,
    "errorMsg": "成功"
}
```
---

> 6. 商品信息

---
> URL:http://www.tp5.com/index.php/api/user/productInfo

> 方式：POST

参数 |是否必须 | 说明
---|---|---
无|无|无

```
{
    "data": [
        {
            "id": 1,
            "imgUrls": [
                "https://www.baidu.com/img/bd_logo1.png",
                "商品图片路径"
            ],
            "price": 20,
            "ifSaleOneself": 1,
            "name": "商品名称",
            "recomProductId": "推荐商品id",
            "stockCount": 30,
            "commentCount": 100,
            "typeList": [
                "麦片巧克力",
                "商品版本"
            ],
            "favcomRate": "98%",
            "recomProduct": "推荐商品标题"
        }
    ],
    "success": true,
    "errorMsg": "成功"
}
```

---

>7. 商品评论

---
> URL:http://www.tp5.com/index.php/api/user/commentCount

> 方式：POST

参数 |是否必须 | 说明
---|---|---
id|是|用户id

```
{
    "data": [
        {
            "moderateCom": 200,
            "allComment": 600,
            "hasImgCom": 100,
            "negativeCom": 0,
            "positiveCom": 300
        }
    ],
    "success": true,
    "errorMsg": "成功"
}
```


---

>8. 某种评论类型

---
> URL:http://www.tp5.com/index.php/api/user/commentDetail

> 方式：POST

参数 |是否必须 | 说明
---|---|---
id|是|用户id

```
{
    "data": [
        {
            "id": 1,
            "imgUrls": "https://www.baidu.com/img/bd_logo1.png",
            "rate": 33,
            "loveCount": 44,
            "commentTime": "2016-03-06 21:55:40（评论时间）",
            "buyTime": "2016-03-02 11:12:19（购买时间）",
            "userLevel": 15,
            "subComment": 689,
            "userName": "2",
            "comment": "评论内容",
            "userImg": "用户头像路径",
            "productType": "产品版本类型"
        }
    ],
    "success": true,
    "errorMsg": "成功"
}
```


---

>9. 购物车

---
> URL:http://www.tp5.com/index.php/api/user/commentDetail

> 方式：POST

参数 |是否必须 | 说明
---|---|---
id|是|用户id

```
{
    "data": [
        {
            "id": 1,
            "imgUrls": "https://www.baidu.com/img/bd_logo1.png",
            "rate": 33,
            "loveCount": 44,
            "commentTime": "2016-03-06 21:55:40（评论时间）",
            "buyTime": "2016-03-02 11:12:19（购买时间）",
            "userLevel": 15,
            "subComment": 689,
            "userName": "2",
            "comment": "评论内容",
            "userImg": "用户头像路径",
            "productType": "产品版本类型"
        }
    ],
    "success": true,
    "errorMsg": "成功"
}
```


