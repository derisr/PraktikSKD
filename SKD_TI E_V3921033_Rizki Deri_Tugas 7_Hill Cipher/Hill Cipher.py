import numpy as np


def encrypt(msg):
    # Hilangkan Spasi
    msg = msg.replace(" ", "")
    # Mengubah kunci char menjadi matriks
    C = make_key()
    # Tambahkan nol jika pesan tidak habis dibagi 2
    len_check = len(msg) % 2 == 0
    if not len_check:
        msg += "0"
    # Isi matriks plaintext dengan pesan
    P = create_matrix_of_integers_from_string(msg)
    # Hitung panjang pesan
    msg_len = int(len(msg) / 2)
    # Menghitung P * C
    encrypted_msg = ""
    for i in range(msg_len):
        # Dot product
        row_0 = P[0][i] * C[0][0] + P[1][i] * C[0][1]
        # Modulasi dan tambahkan 65 untuk kembali ke rentang A-Z di ascii
        integer = int(row_0 % 26 + 65)
        # Ubah kembali ke jenis char dan tambahkan ke teks
        encrypted_msg += chr(integer)
        # Ulangi untuk kolom kedua
        row_1 = P[0][i] * C[1][0] + P[1][i] * C[1][1]
        integer = int(row_1 % 26 + 65)
        encrypted_msg += chr(integer)
    return encrypted_msg

def decrypt(encrypted_msg):
    # Minta kata kunci dan dapatkan matriks enkripsi
    C = make_key()
    # Inverse matriks
    determinant = C[0][0] * C[1][1] - C[0][1] * C[1][0]
    determinant = determinant % 26
    multiplicative_inverse = find_multiplicative_inverse(determinant)
    C_inverse = C
    # Menukar a <-> d
    C_inverse[0][0], C_inverse[1][1] = C_inverse[1, 1], C_inverse[0, 0]
    # Mengganti
    C[0][1] *= -1
    C[1][0] *= -1
    for row in range(2):
        for column in range(2):
            C_inverse[row][column] *= multiplicative_inverse
            C_inverse[row][column] = C_inverse[row][column] % 26

    P = create_matrix_of_integers_from_string(encrypted_msg)
    msg_len = int(len(encrypted_msg) / 2)
    decrypted_msg = ""
    for i in range(msg_len):
        # Dot product
        column_0 = P[0][i] * C_inverse[0][0] + P[1][i] * C_inverse[0][1]
        # Modulasi dan tambahkan 65 untuk kembali ke rentang A-Z di ascii
        integer = int(column_0 % 26 + 65)
        # Ubah kembali ke jenis char dan tambahkan ke teks
        decrypted_msg += chr(integer)
        # Ulangi untuk kolom kedua
        column_1 = P[0][i] * C_inverse[1][0] + P[1][i] * C_inverse[1][1]
        integer = int(column_1 % 26 + 65)
        decrypted_msg += chr(integer)
    if decrypted_msg[-1] == "0":
        decrypted_msg = decrypted_msg[:-1]
    return decrypted_msg

def find_multiplicative_inverse(determinant):
    multiplicative_inverse = -1
    for i in range(26):
        inverse = determinant * i
        if inverse % 26 == 1:
            multiplicative_inverse = i
            break
    return multiplicative_inverse


def make_key():
     # Pastikan penentu sandi relatif prima ke 26 dan hanya a/A - z/Z yang diberikan
    determinant = 0
    C = None
    while True:
        cipher = input("Input 4 letter cipher: ")
        C = create_matrix_of_integers_from_string(cipher)
        determinant = C[0][0] * C[1][1] - C[0][1] * C[1][0]
        determinant = determinant % 26
        inverse_element = find_multiplicative_inverse(determinant)
        if inverse_element == -1:
            print("Determinant is not relatively prime to 26, uninvertible key")
        elif np.amax(C) > 26 and np.amin(C) < 0:
            print("Only a-z characters are accepted")
            print(np.amax(C), np.amin(C))
        else:
            break
    return C

def create_matrix_of_integers_from_string(string):
    # Memetakan string ke daftar bilangan bulat a/A <-> 0, b/B <-> 1 ... z/Z <-> 25
    integers = [chr_to_int(c) for c in string]
    length = len(integers)
    M = np.zeros((2, int(length / 2)), dtype=np.int32)
    iterator = 0
    for column in range(int(length / 2)):
        for row in range(2):
            M[row][column] = integers[iterator]
            iterator += 1
    return M

def chr_to_int(char):
    # Huruf besar karakter untuk masuk ke kisaran 65-90 di tabel ascii
    char = char.upper()
    # Keluarkan char ke int dan kurangi 65 untuk mendapatkan 0-25
    integer = ord(char) - 65
    return integer

if __name__ == "__main__":
    msg = input("Message: ")
    encrypted_msg = encrypt(msg)
    print(encrypted_msg)
    decrypted_msg = decrypt(encrypted_msg)
    print(decrypted_msg)
