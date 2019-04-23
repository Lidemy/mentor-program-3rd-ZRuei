## 跟你朋友介紹 Git

Git 是一套用來執行版本控制的程式。所謂版本控制是指專案進行時，可以保留每一次修改、更新的歷史紀錄，每個紀錄都有屬於自己的亂數名稱，可以避免多人寫作時造成的命名混亂，或是檔案遭到錯誤覆寫，並且隨時能夠利用保留的紀錄回到某一次修改版本。以菜哥的笑話檔案來說，就是能夠記錄每一次修改的笑話版本，當你在某個老笑話的基礎上新增笑點時，就像替程式增加新功能，你可以在修改老笑話的同時，開出支線（branch）增加新笑點，最後再將兩者合併，完成一個最棒最完整的笑話。

Git 做的事就是替你保存所有歷史紀錄（commit），並且利用分支（branch）編寫其他程式，滿足更多功能上的需求，避免檔案的混亂。

現在就以你的笑話來做練習吧!

1. 新增一個笑話的資料夾「jokecollection」
```
mkdir jokecollection
```
2. 在 jokecollection 內新增文字檔「joke1」
```
cd jockcollection
touch joke1.md
```
3. 將當前位置切換至 jockcollection，植入版本控制
```
cd jockcollection
git init
```
5. 將資料夾加入版本控制，並確認裡面的檔案
```
git add.
git status
```
6. 提交版本控制（commit）
```
git commit
```
7. 當菜哥對 joke1 進行了第 N 次修改後，每一次都必須再次確認和提交，並留下修改訊息
```
git commit -am "第n回修正"
```
8. 查看每次修改的紀錄
```
git log
```
9. 加入新的笑話，檔名是 joke2
```
git add joke2
git commit -m "new one"
```
10. 覺得某一次歷史修改的笑話比最新的好笑，可以回到某一版本
```
git log 
git checkout 版本序號
```
11. 查看版本間差異
```
git diff
```

12. 為了加入新笑點到 joke1，開啟支線 punchline 
```
branch punchline
```
13. 切換到 punchline，提交版本（commit）
```
git checkout punchline
git commit -am "新笑點"
```
14. 把 punchline 跟 master 合併
```
git checkout master
git merge punchline
```
15. 如果想把笑話集跟別人分享，開放大家一起寫笑話，可以把它上傳到 github
```
git push origin master
```

16. 反過來說，如果菜哥在github上做了一些修改，也可以把它載回到自己的電腦。
```
git pull origin master
```