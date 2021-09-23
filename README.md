
# My Now - Trang web đặt đồ ăn trực tuyến

Sử dụng Laravel + VueJS



## Installation

Clone repo này về và cd vào trong nó
```bash
  git clone https://github.com/Ily-1606/My-Now.git
  cd ./My-Now
```
Import file now.vn.sql vào database

Sử dụng GPS và đăng nhập bằng facebook (nên yêu cầu phải sử dụng SSL), vui lòng thêm https để sử dụng

Thêm now.vn.test vào .host file

Google Map SDK chưa kích hoạt thanh toán, vui lòng đổi key để sủ dụng

## Development
Sử dụng lệnh development và watch để vào chế độ phát triển
```npm
npm run development
npm run watch
```

Trang admin sử dụng ant design

Các trang ở user sử dụng Bootstrap

Có 3 role chính:
- User thông thường (user_type ở database là member)
- Seller (MiddleWare là isAdmin và user_type ở database seller)
- Admin (MiddleWare là isSupperUser và user_type ở database là admin)


  