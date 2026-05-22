# PLAN.md - Ke hoach thuc hien project

## 1. Muc tieu project

Xay dung website gioi thieu va dat cac hoat dong trai nghiem dia phuong, vi du: lam gom, nau an, tham quan lang nghe, trai nghiem van hoa, hoat dong ngoai troi.

He thong can co:

- Giao dien frontend cho nguoi dung.
- Trang quan tri backend cho quan tri vien.
- Ket noi co so du lieu MySQL/MariaDB.
- Chuc nang CRUD day du.
- Validation du lieu dau vao.
- Authentication/Login.
- Phan quyen co ban.
- Upload hinh anh cho hoat dong trai nghiem.
- Quan ly source code bang Git va GitHub.

## 2. Cong nghe bat buoc

- PHP va Laravel Framework.
- HTML, CSS, JavaScript.
- MySQL hoac MariaDB.
- Git va GitHub.

## 3. Pham vi chuc nang

### 3.1. Nguoi dung

- Dang ky tai khoan.
- Dang nhap he thong.
- Xem danh sach trai nghiem hien co.
- Tim kiem trai nghiem theo dia diem, loai trai nghiem hoac muc gia.
- Xem chi tiet trai nghiem, gom thong tin, hinh anh, thoi gian va nguoi to chuc.
- Dang ky tham gia trai nghiem.
- Xem lich su cac trai nghiem da dang ky.

### 3.2. Quan tri vien

- Quan ly hoat dong trai nghiem: them, xem, sua, xoa.
- Quan ly loai trai nghiem: am thuc, lang nghe, van hoa, thien nhien...
- Quan ly nguoi to chuc: thong tin ca nhan hoac don vi to chuc.
- Quan ly don dang ky: xac nhan hoac huy don dang ky trai nghiem.
- Thong ke co ban: so luong trai nghiem, so luong don dang ky va doanh thu.

## 4. Du lieu toi thieu

Can thiet ke va luu tru toi thieu cac nhom du lieu sau:

- Nguoi dung.
- Hoat dong trai nghiem.
- Loai trai nghiem.
- Nguoi to chuc.
- Don dang ky.

## 5. Ke hoach thuc hien

### Giai doan 1: Khoi tao project va cau hinh nen tang

- Khoi tao project Laravel.
- Cau hinh file moi truong `.env`.
- Ket noi MySQL/MariaDB.
- Khoi tao Git repository.
- Tao repository rieng tren GitHub.
- Commit va push source code ban dau.

### Giai doan 2: Phan tich va thiet ke co so du lieu

- Xac dinh cac bang chinh:
  - `users`
  - `experience_categories`
  - `organizers`
  - `experiences`
  - `bookings`
- Xac dinh quan he giua cac bang:
  - Mot loai trai nghiem co nhieu hoat dong trai nghiem.
  - Mot nguoi to chuc co nhieu hoat dong trai nghiem.
  - Mot nguoi dung co nhieu don dang ky.
  - Mot hoat dong trai nghiem co nhieu don dang ky.
- Tao migration, model va seeder can thiet.
- Chuan bi du lieu mau de kiem thu giao dien va chuc nang.

### Giai doan 3: Xay dung Authentication va phan quyen

- Xay dung chuc nang dang ky.
- Xay dung chuc nang dang nhap va dang xuat.
- Thiet lap phan quyen co ban:
  - Nguoi dung thuong.
  - Quan tri vien.
- Gioi han quyen truy cap trang quan tri chi cho quan tri vien.

### Giai doan 4: Xay dung frontend cho nguoi dung

- Tao trang danh sach trai nghiem.
- Tao chuc nang tim kiem va loc theo dia diem, loai trai nghiem, muc gia.
- Tao trang chi tiet trai nghiem.
- Tao form dang ky tham gia trai nghiem.
- Tao trang lich su dang ky cua nguoi dung.
- Them validation cho cac form nguoi dung.

### Giai doan 5: Xay dung backend quan tri

- Tao layout trang quan tri.
- Xay dung CRUD quan ly loai trai nghiem.
- Xay dung CRUD quan ly nguoi to chuc.
- Xay dung CRUD quan ly hoat dong trai nghiem.
- Them upload hinh anh cho hoat dong trai nghiem.
- Xay dung trang quan ly don dang ky.
- Them chuc nang xac nhan va huy don dang ky.
- Them validation cho tat ca form quan tri.

### Giai doan 6: Thong ke va dashboard

- Tao dashboard thong ke co ban.
- Hien thi tong so hoat dong trai nghiem.
- Hien thi tong so don dang ky.
- Hien thi doanh thu du kien hoac doanh thu tu don da xac nhan.
- Neu co thoi gian, them bieu do hoac giao dien thong ke truc quan.

### Giai doan 7: Hoan thien giao dien va trai nghiem su dung

- Kiem tra giao dien frontend tren desktop.
- Kiem tra responsive mobile de dat diem cong.
- Cai thien menu, form, bang du lieu va trang chi tiet.
- Hien thi thong bao thanh cong/that bai sau khi thao tac.
- Kiem tra loi validation va hien thi thong bao ro rang.

### Giai doan 8: Kiem thu

- Kiem thu dang ky, dang nhap, dang xuat.
- Kiem thu phan quyen nguoi dung va quan tri vien.
- Kiem thu CRUD cac du lieu chinh.
- Kiem thu upload hinh anh.
- Kiem thu tim kiem va loc trai nghiem.
- Kiem thu dang ky trai nghiem va lich su dang ky.
- Kiem thu xac nhan/huy don dang ky.
- Kiem thu thong ke co ban.

### Giai doan 9: Quan ly GitHub

- Commit va push code thuong xuyen.
- Moi thanh vien can co lich su commit ro rang.
- Noi dung commit can mo ta dung thay doi da thuc hien.
- Tranh chi mot nguoi commit toan bo project.
- Tranh don commit vao cuoi ky.
- Khong copy project co san tu Internet.

### Giai doan 10: Bao cao va ban giao

- Tong hop cac chuc nang da thuc hien.
- Mo ta cong nghe su dung.
- Mo ta co so du lieu va quan he bang.
- Chup anh cac man hinh chinh.
- Ghi nhan phan cong cong viec va dong gop cua tung thanh vien.
- Chuan bi demo cac luong chinh:
  - Nguoi dung xem va dang ky trai nghiem.
  - Quan tri vien quan ly trai nghiem.
  - Quan tri vien xu ly don dang ky.
  - Quan tri vien xem thong ke.

## 6. Chuc nang diem cong neu con thoi gian

- Responsive mobile tot.
- Dashboard thong ke co bieu do.
- Danh gia trai nghiem: nguoi dung cham diem va nhan xet sau khi tham gia.
- Tich hop Google Maps de hien thi vi tri dien ra hoat dong trai nghiem.
- Deploy website online len hosting, VPS hoac Render.

## 7. Tieu chi hoan thanh

- Project chay duoc bang Laravel.
- Co frontend va backend quan tri.
- Co ket noi MySQL/MariaDB.
- Co cac bang du lieu toi thieu theo yeu cau.
- Co CRUD day du cho cac du lieu quan tri chinh.
- Co dang nhap, dang ky va phan quyen co ban.
- Co validation du lieu.
- Co upload hinh anh.
- Co quan ly don dang ky.
- Co thong ke co ban.
- Source code duoc quan ly tren GitHub voi lich su commit ro rang.
