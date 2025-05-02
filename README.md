
# 🚀 Quy trình làm việc với Git (Feature Branch Workflow)
//////////////////////////////////////
Clone về máy (nếu cần)
git clone https://github.com/your-username/your-repository.git


# Bước vào thư mục dự án (hoặc tạo thư mục mới)
mkdir my-project
cd my-project

# Khởi tạo repo Git
git init

# (Tuỳ chọn) Tạo file README hoặc file khác
echo "# My Project" > README.md

# Thêm file vào repo
git add .

# Commit file đầu tiên
git commit -m "First commit"


git remote add origin https://github.com/
git branch -M main  # Đổi tên nhánh chính thành main nếu chưa phải
git push -u origin main

////////////////////////////////////
## 🔁 1. Cập nhật code mới nhất từ nhánh `main`

```bash
git checkout main
git fetch
git pull origin main
```

## 🌱 2. Tạo nhánh mới cho tính năng đang làm

**Đặt tên theo cấu trúc:** `func/ten_chuc_nang`

Ví dụ:
```bash
git checkout -b func/show_product
git checkout func/test

```

## 🛠️ 3. Viết code và commit

### Kiểm tra trạng thái file:
```bash
git status
```

### Thêm tất cả thay đổi:
```bash
git add .
```

### Commit với nội dung ngắn gọn mô tả chức năng:
```bash
git commit -m "Thêm chức năng hiển thị sản phẩm"
```

## 🚀 4. Đẩy nhánh lên Git (đưa code lên repository)

```bash
git push origin func/show_product
```

## 🧹 5. Sau khi merge nhánh vào main (trên GitHub hoặc GitLab)

### Xóa nhánh local:
```bash
git branch -d func/show_product
```

### Xóa nhánh remote (nếu cần):
```bash
git push origin --delete func/show_product
```

---

## 💡 Một số lệnh Git hữu ích

| Lệnh | Công dụng |
|------|----------|
| `git log --oneline` | Xem lịch sử commit ngắn gọn |
| `git diff` | So sánh sự khác biệt trước khi commit |
| `git stash` | Lưu tạm thay đổi chưa commit |
| `git stash pop` | Khôi phục lại thay đổi đã stash |
| `git branch` | Xem nhánh local |
| `git branch -r` | Xem nhánh remote |

---

## 📝 Ghi chú

- Luôn **checkout về `main`** và **pull code mới nhất** trước khi tạo nhánh mới.
- Tên nhánh nên **ngắn gọn, rõ ràng**, tránh dùng dấu cách.
- Mỗi nhánh nên làm **một tính năng hoặc sửa lỗi riêng biệt**.
- Luôn **viết nội dung commit rõ ràng**, giúp người khác hiểu bạn làm gì.
