#include <bits/stdc++.h>
using namespace std;
#define lt length()

int T, Q, P;
string C[100][100];

string tambah(string a, string b) {
	string res = "";
	int sisa = 0;
	for (int i = 1; i <= max(a.lt, b.lt); i++) {
		int ida = a.lt-i;
		int idb = b.lt-i;
		string x = " ";
		if (ida < 0) x[0] = sisa+b[idb];
		else if (idb < 0) x[0] = sisa+a[ida];
		else x[0] = sisa+a[ida]+b[idb]-'0';
		sisa = 0;
		if (x[0] > '9') {
			x[0] -= 10;
			sisa = 1;
		}
		res = x+res;
	}
	if (sisa > 0) {
		res = "0" + res;
		res[0] += sisa;
	}
	return res;
}

string kali(string a, string b) {
	string res = "";
	string base = "";
	for (int i = a.lt-1; i >= 0; i--) {
		string tmp = base;
		for (int j = b.lt-1; j >= 0; j--) {
			int x = (a[i]-'0')*(b[j]-'0');
			string y = "";
			if (x > 0) {
				while (x > 0) {
					y = " "+y;
					y[0] = (x%10)+'0';
					x /= 10;
				}
				res = tambah(res, (y+base));
			}
			base += "0";
		}
		base = tmp + "0";
	}
	return res;
}

string pangkat(string x, int pwr) {
	if (pwr == 1) return x;
	if (pwr == 0) return "1";
	string a = kali(x, x);
	if (pwr%2 == 0) return a;
	return kali(a, x);
}

void generate() {
	C[0][0] = "1";
	for (int i = 1; i <= 25; i++) {
		C[i][0] = "1";
		for (int j = 1; j <= i; j++) {
			C[i][j] = tambah(C[i-1][j-1], C[i-1][j]);
//			cout << C[i][j] << " ";
		}
//		cout << "\n";
	}
}

int main() {
	generate();
	cin >> T;
	while (T--) {
		cin >> P >> Q;
		for (int pkt = Q; pkt >= 0; pkt--) {
			string x = "0";
			x[0] += P;
			string tmp = kali(pangkat(x, Q-pkt), C[P][Q-pkt]);
			if (tmp != "1") cout << tmp;
			if (pkt != 0) cout << "x";
			if (pkt > 1) cout << pkt;
			if (pkt > 0) cout << " ";
		}
		cout << "\n";
	}
}
