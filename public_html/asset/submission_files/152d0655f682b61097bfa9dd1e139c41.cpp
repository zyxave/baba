#include <bits/stdc++.h>
#define len length()
using namespace std;
int main(){
	int tc;	cin >> tc;
	while(tc--){
		int n, temp;	cin >> n;
		bool gagal = false;
		temp = n;
		string zz = "";
		while(n--){
			int num = 1, sp = 0;
			string s, kota, hasil = "";	cin >> s;
			getline(cin, kota);
			for(int i = 0; i < kota.len; i++)
				if(kota[i] == ' ')	sp++;
			if(sp > 1)	gagal = true;
			if(kota.len < 4 || kota.len > 21)
				gagal = true;
			else if(s.len + kota.len > 20)
				gagal = true;
			//cout << sp << " " << kota.len << " " << s.len << endl;
			hasil += s[0];
			hasil += s[1];
			hasil += s[2];
			if(zz.find(hasil) == string::npos){
				zz += hasil;
				if(num != temp) zz += " ";
				num++;
			}
			else{
				hasil = "";
				hasil += s[0];
				hasil += s[1];
				hasil += kota[1];
				if(zz.find(hasil) == string::npos){
					zz += hasil;
					if(num != temp)	zz += " ";
				}
				else	gagal = true;
				num ++;
			}
		}
		if(gagal == true)	cout << "GAGAL\n";
		else	cout << zz << endl;
	}
}
