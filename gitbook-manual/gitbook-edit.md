 
# 创建gitbook书籍

## 初始化gitbook

新建一个空目录mygitbook, 在该目录下，运行

> gitbook init
	
这样就会在mygitbook下生成两个文件**README.md**和**SUMMARY.md**


## 编辑gitbook
	
在**README.md**文件中增加说明介绍

在**SUMMARY.md**文件中增加章节

然后新增加md文件，然后将md文件的信息增加到**SUMMARY.md**中，以便显示在章节中



## 生成书籍

> gitbook build
	
> gitbook serve
	
然后打开浏览器 http://localhost:4000 就能看到生成的书籍


## 注意

gitbook 3.2.3版本有个bug，会导致gitbook serve和gitbook build一直失败

修改文件**C:\Users\\{登录的用户名}\\.gitbook\versions\3.2.3\lib\output\website\copyPluginAssets.js**
中的**112行**中的
> confirm: true  --> confirm: false