# Install Guide (Test in Win10)

## ติดตั้งโปรแกรมที่จำเป็น 
1. xampp ดาวน์โหลดได้จาก
https://www.apachefriends.org/index.html

2. composer ดาวน์โหลดได้จาก 
https://getcomposer.org/Composer-Setup.exe

_ทดสอบการติดตั้ง composer ด้วยการพิมพ์คำสั่งต่อไปนี้ใน command line_
`composer`

---

## ติดตั้งตัวโปรเจค
โคลนโปรเจคจาก Github
`git clone https://github.com/MigMikael/mctric-project.git`

ย้ายไป branch dev
`git checkout dev`

`git pull origin dev`

---

## ติดตั้ง Package ที่จำเป็น
เปิด command line แล้ว cd ไปในโฟลเดอร์โปรเจค (cd mctric-project) จากนั้นพิมพ์คำสั่ง
`composer install`

ก็อบปี้ไฟล์ .env.example ที่อยู่ภายในโปรเจคแล้วเปลี่ยนชื่อเป็น .env จากนั้นพิมพ์คำสั่ง
`php artisan key:generate`

---

## เชื่อมต่อ Database
เปิดไฟล์ .env ด้วย text editor อะไรก็ได้ จากนั้นแก้แก้บรรทัดที่ 12 - 14 ตามนี้ (username & pass ตามที่ตั้งไว้ ของผมเป็นแบบนี้)
DB_DATABASE=mctric_db
DB_USERNAME=root
DB_PASSWORD=

เปิด xampp จากนั้น start Apache และ MySQL

เข้า web browser ไปที่ phpmyadmin http://localhost/phpmyadmin

ในแถบด้านซ้ายบนกด New ช่อง Database name ใส่ชื่อดาต้าเบสตามที่ได้ใส่ไว้ในไฟล์ .env (mctric_db) กดปุ่ม Create
(จริงๆ ชื่อดาต้าเบสจะตั้งอะไรก็ได้แหละขอให้เหมือนกันกับในไฟล์ .env)

เปิด command line cd ไปที่โฟลเดอร์โปรเจคแล้วพิมคำสั่ง
`php artisan migrate`

---

## ทดลองเล่น
สุดท้ายเปิดเซิฟด้วยคำสั่ง 
`php artisan serv`

ตอนนี้ผมย้ายหน้ามาลงหมดแล้ว หน้า Business สามารถ Create Read Update Delete แต่ละโปรเจคแนบรูปประกอบได้หนึ่งรูป
ตอนนี้ยังไม่ได้แยกส่วน (ปุ่ม Create, ปุ่ม Update, ปุ่ม Delete ไปไว้ที่หน้า Admin รอทำระบบ Login)

วิวทั้งหมดอยู่ที่ \mctric-project\resources\views
มี app.blade.php เป็นตั้วหลักแล้ววิวอื่นๆ extend มา

จัดการ route ได้ที่ \mctric-project\routes\web.php
