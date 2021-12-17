# Phân tích đề tài
Các chức năng:
    a. Khách hàng ko có tài khoản( khách vãn lai)
        - Xem danh sách, xem chi tiết, tìm kiếm sản phẩm
        - Đăng ký, đăng nhập.
    b. Khách hàng có tài khoản (Thành viên)
        - Đăng nhập, Đăng xuất, Đổi mật khẩu.
        - Xem danh sách, xem chi tiết, tìm kiếm sản phẩm.
        - Xem, Thêm, Xóa, Cập Nhật giỏ hàng.
        - Thanh toán.
        - Xem hóa đơn của bản thân.
        - Cập nhật thông tin cá nhân.
    c. Quản trị
        - Đăng nhập, Đăng xuất.
        - Xem, thêm, sửa, xóa sản phẩm.
        - Chấp nhận, từ chối đơn hàng.
        - Xem, thêm, xóa, cập nhật nhân viên.
        - Xem, thêm, xóa, cập nhật khách hàng.
        - Xem, thêm, xóa, cập nhật đơn hàng.
        - Xem, thêm, xóa, cập nhật nhà sản xuất.
        - Cập nhật thông tin cá nhân.
# Xữ lý:
    a. Khách hàng ko có tài khoản( khách vãn lai)
        - Hiện trang danh sách cá sản phẩm nổi bật, top sale,... Chuyển đến trang chi tiết khi người dùng click vào sản phẩm.
        - Chi tiết sản phẩm.
        - Hiện menu đường dẫn tới các danh mục sản phẩm.
        - Hiện các phím chức năng:
            + Hộp tìm kiếm: Cho phép người dùng điền -> hiện danh sách sản phẩm theo tên, nhà sản xuất, danh mục,...
            + Đăng nhập: Cho phép người dùng điền và gửi form đăng nhập -> xữ lý đăng nhập cho người dùng, ghi nhó đăng nhập.
            + Đăng ký: Cho phép người dùng điền và gửi form đăng ký -> xữ lý tạo mới người dùng + đăng nhập cho người dùng.

    b. Khách hàng có tài khoản (Thành viên)
        - Tương tự khách vãng lai, thêm một số chức năng:
            + Trang thông tin khách: tên, tuổi, địa chỉ, sdt, giới tính.
                . Cập nhật thông tin.
            + Đổi mật khẩu.
                . Mật khẩu cũ + Mật khẩu mới + Xác nhận mật khẩu mới.
            + Hiện nút thêm sản phẩm vào giỏ hàng, yêu thích sản phẩm.
            + Hiện giỏ hàng.
                . Danh sách sản phẩm + số lượng + giá từng loại sản phẩm + Tổng giá của giỏ hàng.
                . Cho phép người dùng cập nhật số lượng loại sản phẩm có trong giỏ hàng.
            + Thanh toán giỏ hàng:
                . Điền thông tin: Hiện thông tin khách từ database, cho phép khách hàng chỉnh sửa lại.
                . Hình thức thanh toán: Tiền mặt.
                . Hình thức vận chuyển.
                . Tổng giá trị thanh toán = Phí vận chuyển + Tổng giá giỏ hàng - Giá sale(nếu có).
                . Xác nhận thanh toán.
                . Hoàn thành thanh toán.
            + Đăng Xuất.
    c. Quản trị
        - Đăng nhập -> giao diện quản trị.
        - Thống kê doanh số.
        - Xem, Thêm, Xóa, Sửa sản phẩm.
        - Quản lý đơn hàng:
            + Chấp nhận, từ chối các đơn hàng chưa chấp nhận.
            + Xem chi tiết cập nhật trạng thái các đơn hàng.
            + Xóa các đơn hàng hủy.
        - Quản lý khách hàng.
            + Xem danh sách khách hàng.
            + Thêm khách hàng.
            + Chỉnh sửa trạng thái khách hàng.
        - Xem, thêm, xóa, cập nhật nhà sản xuất.
        - Xem danh sách cá quản trị viên.
        - Cập nhật thông tin cá nhân.
        - Đăng xuất.

        ???? Phân quyền từng user ????
            + Administrator -> toàn quyền
            + Quản trị viên khác -> Chỉ làm được những hành động đã được cấp.
            + Không được xóa các user cùng hoặc hơn cấp.
