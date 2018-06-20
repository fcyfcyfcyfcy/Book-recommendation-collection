# 书籍推荐收藏

### 项目成员
> 郑 柳 2016210405063 <font color='red' face="黑体">组长</font></br>
> 王胤凯 2016210405045 </br>
> 陈铭璇 2016210405062

### 项目描述
> 一个书籍推荐系统PC端，根据个人喜好推荐相同类别的书籍。</br>
> 在推荐界面支持收藏以及更换推荐书籍的功能。</br>
> 根据自己的喜好，可以在搜索界面查找书籍，在书籍搜索界面也可以进行收藏。</br>
> 在个人的收藏夹中会显示收藏的书籍的图片以及书名，点击图片可以在新窗口查看豆瓣关于这门书的详细信息。


### 界面设计

1. 登陆界面</br>
![](http://106.15.186.59/images/1.jpg)


2. 注册界面</br>
![](http://106.15.186.59/images/2.jpg)


3. 推荐界面</br>
![](http://106.15.186.59/images/3.png)


4. 搜索界面</br>
![](http://106.15.186.59/images/4.png)


5. 个人收藏界面</br>
![](http://106.15.186.59/images/5.jpg)


6. 个人中心</br>
![](http://106.15.186.59/images/6.png)



### 数据结构

* user

| user_id  | name    |     pwd     | image.addr     | favourite_type |
| :------: | :-----: | :---------: | :------------: | :------------: |
| 1        | abc     |    123456   |    art         | img/xx.jpg     |
| 2        | def     |    456789   |    computer    |                |

* book

| book_id   | title              | author           |cover_addr               | type     |   grade    | intro | Alt|
|:---------:| :-----------------:| :--------------: |:----------------------: | :-------:| :--------: | :-----------------------------------------------------------------------------: | :---------: |
| 1         | HTml5与css3基础教程 | Elizabeth Castro | images/book_1_cover.png | computer | 4          | 讲解html和css入门知识的经典畅销书，全面系统的讲解html5和css的基础知识以及实际运用技术 | https:/xxxxx/xxxx/|
* usercollect

|  name   | book_id |   Alt      |
| :-----: | :-----: |:--------:  |
| admin   | 1       |http:/xxx/  |
| admin   | 2       |http:/xxx/  |

* usercollectdouban

|  name   | collect_id | title | cover_addr |   Alt      |
| :-----: | :--------: | :---: | :--------: |:--------:  |
| admin   | 1          | 牛     | http:/xxx/ |http:/xxx/  |
| admin   | 2          | 牛蛙   | http:/xxx/ |http:/xxx/  |

### 功能模块
>    1. 登录注册功能</br>
>    用户在注册界面注册时，输入的信息只有通过了验证，才会将数据添加到后端数据库user表中储存。
>    反之，弹出信息不匹配的原因并返回注册页面。</br>
>    用户在登录界面登录时，将输入的信息与user表中的数据进行匹配验证。
>    如果验证通过，跳转到成功登录后的页面。
>    反之，弹出信息不匹配的原因并返回登录页面。
>    
>    2. 推荐书籍功能</br>
>    根据用户设定的喜欢书籍的类型（favorite_type），
>    每天推荐他有可能会喜欢并且未收藏的书籍，显示在推荐界面上。</br>
>    思路：先在user根据name得到此用户的favorite_type，
>    再在book中根据type = favorite_type得到一本此类书籍的book_id，
>    且在usercollect中满足此书book_id不存在于此用户收藏的book_id中。
>    如果满足了，则推荐该书，在book中由book_id得到该书各项属性，
>    显示在书籍推荐界面上；如果不满足，选下一个book_id，直到满足。
>    
>    3. 收藏书籍功能</br>
>    每本书籍都有收藏按钮，用户可以收藏书籍
>    点击之后，提示该书被收藏，按钮显示已收藏。
>    相关的响应函数，鼠标点下，数据库usercollect增加一行数据。
>    
>    4. 搜索书籍功能</br>
>    根据输入，调用豆瓣的搜索API，根据关键字搜索相关的书籍，在界面上显示相关书籍的书名、作者、出版社、豆瓣评分以及简介，最多显示20条数据。
>    
>    5. 跳转豆瓣查看书籍的详细信息</br>
>    在个人收藏界面点击书籍会打开一个新的窗口，然后可以看到这本书在豆瓣上的详细信息；
>    在搜索界面搜索到的书籍点击learn more按钮也可以打开新窗口跳转到豆瓣查看这本书的详细信息。
>    
>    6. 个人中心</br>
>    个人中心仅仅显示最近在推荐界面收藏的三本自己喜欢类型的书籍，通过搜索得到的书籍只会在个人收藏夹中显示。
>    个人收藏界面会显示搜索的时候收藏的书籍以及在推荐界面收藏的书籍。


### 项目分工
>    1. 推荐界面、个人中心：郑柳
>    2. 收藏界面、搜索界面：王胤凯
>    3. 登录界面、注册界面：陈铭璇 </br>
>    实现每个界面，包括所有的前端后端，相关算法和响应函数
