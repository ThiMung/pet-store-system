@extends('layouts.admin')

@section('title', 'Quản lý người dùng')

@section('content')

@if(session('success'))
    <div class="mb-4 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-xl shadow-sm italic text-sm animate-pulse">
        ✨ {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-xl shadow-sm italic text-sm">
        ⚠️ {{ session('error') }}
    </div>
@endif

<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-lg font-bold text-gray-800">Danh sách người dùng</h2>
        <p class="text-gray-400 text-xs mt-1">Chỉ hiển thị và quản lý tài khoản khách hàng (Role: User)</p>
    </div>
    <button onclick="toggleModal('userModal')" class="bg-gradient-to-r from-pink-500 to-orange-600 text-white px-5 py-2.5 rounded-xl shadow-lg hover:shadow-pink-200 transition-all font-bold text-sm">
        + Thêm người dùng mới
    </button>
</div>

<div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50/50 text-gray-400 text-[11px] uppercase font-bold tracking-widest">
            <tr>
                <th class="py-4 px-6 text-center w-24">User ID</th>
                <th class="px-6">Họ và tên</th>
                <th class="px-6">Email</th>
                <th class="px-6 text-center">Ngày tham gia</th>
                <th class="px-6 text-center">Thao tác</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($users as $user)
            <tr class="hover:bg-gray-50/30 transition text-sm">
                <td class="py-4 text-center font-mono text-blue-600 font-bold">#{{ $user->id }}</td>
                <td class="px-6">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-xs shadow-sm">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <span class="font-bold text-gray-700">{{ $user->name }}</span>
                    </div>
                </td>
                <td class="px-6 text-gray-600 italic">{{ $user->email }}</td>
                <td class="px-6 text-center text-gray-500 font-medium">
                    {{ $user->created_at ? $user->created_at->format('d/m/Y') : 'Chưa có ngày' }}
                </td>
                <td class="px-6">
                    <div class="d-flex justify-content-center gap-2">
                        <button type="button" onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}')" class="btn btn-outline-warning btn-sm border-0">
                            <i class="bi bi-pencil-square fs-5"></i>
</button>

                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?')" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm border-0">
                                <i class="bi bi-trash3-fill fs-5"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="py-10 text-center text-gray-400 italic">
                    Chưa có người dùng nào trong danh sách.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="p-4 bg-gray-50/50 border-t border-gray-100">
        {{ $users->links() }}
    </div>
</div>

<div id="userModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all">
        <div class="p-6 border-b flex justify-between items-center bg-gradient-to-r from-pink-500 to-orange-600">
            <h4 class="font-bold text-white">Tạo tài khoản người dùng</h4>
            <button onclick="toggleModal('userModal')" class="text-gray-400 hover:text-gray-600 text-2xl transition">&times;</button>
        </div>

        <form action="{{ route('admin.users.store') }}" method="POST" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-[11px] font-bold text-gray-400 uppercase mb-1 ml-1">Họ và tên</label>
                <input type="text" name="name" required placeholder="Nhập tên khách hàng..."
                    class="w-full px-4 py-3 border border-gray-100 bg-gray-50 rounded-xl focus:ring-2 focus:ring-blue-400 focus:bg-white outline-none transition">
            </div>

            <div>
                <label class="block text-[11px] font-bold text-gray-400 uppercase mb-1 ml-1">Email</label>
                <input type="email" name="email" required placeholder="example@gmail.com"
                    class="w-full px-4 py-3 border border-gray-100 bg-gray-50 rounded-xl focus:ring-2 focus:ring-blue-400 focus:bg-white outline-none transition">
            </div>

            <div>
                <label class="block text-[11px] font-bold text-gray-400 uppercase mb-1 ml-1">Mật khẩu</label>
                <input type="password" name="password" required placeholder="Tối thiểu 8 ký tự"
                    class="w-full px-4 py-3 border border-gray-100 bg-gray-50 rounded-xl focus:ring-2 focus:ring-blue-400 focus:bg-white outline-none transition">
            </div>

            <div class="pt-2">
<button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-orange-600 text-white py-3.5 rounded-xl font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-100">
                    Xác nhận thêm khách hàng
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Sửa Người Dùng -->
<div id="editUserModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all">
        <div class="p-6 border-b flex justify-between items-center bg-gradient-to-r from-pink-500 to-orange-600">
            <h4 class="font-bold text-white">Chỉnh sửa thông tin người dùng</h4>
            <button onclick="toggleModal('editUserModal')" class="text-gray-400 hover:text-gray-600 text-2xl transition">&times;</button>
        </div>

        <form id="editUserForm" method="POST" class="p-6 space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-[11px] font-bold text-gray-400 uppercase mb-1 ml-1">Họ và tên</label>
                <input type="text" id="editName" name="name" required placeholder="Nhập tên khách hàng..."
                    class="w-full px-4 py-3 border border-gray-100 bg-gray-50 rounded-xl focus:ring-2 focus:ring-blue-400 focus:bg-white outline-none transition">
            </div>

            <div>
                <label class="block text-[11px] font-bold text-gray-400 uppercase mb-1 ml-1">Email</label>
                <input type="email" id="editEmail" name="email" required placeholder="example@gmail.com"
                    class="w-full px-4 py-3 border border-gray-100 bg-gray-50 rounded-xl focus:ring-2 focus:ring-blue-400 focus:bg-white outline-none transition">
            </div>

            <div>
                <label class="block text-[11px] font-bold text-gray-400 uppercase mb-1 ml-1">Mật khẩu (để trống nếu không đổi)</label>
                <input type="password" id="editPassword" name="password" placeholder="Tối thiểu 8 ký tự"
                    class="w-full px-4 py-3 border border-gray-100 bg-gray-50 rounded-xl focus:ring-2 focus:ring-blue-400 focus:bg-white outline-none transition">
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-gradient-to-r from-pink-500 to-orange-600 text-white py-3.5 rounded-xl font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-100">
                    Cập nhật thông tin
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Hàm đóng mở Modal
    function toggleModal(id) {
        const modal = document.getElementById(id);
        modal.classList.toggle('hidden');
    }

    // Hàm mở modal sửa với dữ liệu người dùng
    function openEditModal(userId, userName, userEmail) {
document.getElementById('editName').value = userName;
        document.getElementById('editEmail').value = userEmail;
        document.getElementById('editPassword').value = '';
        document.getElementById('editUserForm').action = `/admin/users/${userId}`;
        toggleModal('editUserModal');
    }

    // Đóng modal khi click ra ngoài vùng trắng
    window.onclick = function(event) {
        const userModal = document.getElementById('userModal');
        const editUserModal = document.getElementById('editUserModal');
        if (event.target == userModal) {
            userModal.classList.add('hidden');
        }
        if (event.target == editUserModal) {
            editUserModal.classList.add('hidden');
        }
    }
</script>

@endsection