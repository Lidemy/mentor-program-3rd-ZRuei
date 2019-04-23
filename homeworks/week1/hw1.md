## 交作業流程

1. 設置完 Github Classroom 把個人作業專案下載到 local
```
git clone https://github.com/Lidemy/mentor-program-3rd-ZRuei.git

*Eslint 環境設置
brew install node
npm install
npm audit fix
npm audit
```

2. 每次提交作業或是任何修改，都要新增 branch ，並切換到新的 branch，避免直接在 master 更動
```
git branch w1HW
git checkout w1HW
```
3. 完成作業後，提交 local 端的更新檔案
```
git commit -am "submit week1 HW"
```
4. 把 branch w1HW 上傳 github
```
git push origin w1HW
```
5. 在 github 上點按 ```Compare & pull request```，輸入上傳訊息，點 ``` Create pull request```
6. 到 homeworks-3rd 新增 Issue，在訊息框輸入作業連結
7. 等待作業批改後，w1HW 合併到 master，回到 local 端切換至 master
``` 
git checkout master
```
8. 把 github 上已更新的 master 抓下來
``` 
git pull origin master
```
9. 刪除 local 端 branch w1HW
```
git branch -d w1HW
```