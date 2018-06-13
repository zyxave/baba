#include <iostream>

using namespace std;
int uang[100][100],a,sisa,jumlah,hasil[100];
int main(){
	cin >> a;
	for (int c = 0; c<a;c++){
		cin >> uang[c][c+1] >> uang[c][c-1];
		sisa = uang[c][c+1] - uang[c][c-1];
		jumlah += (sisa/100);
		sisa -= (sisa/100)*100;
		jumlah += (sisa/20);
		sisa -= (sisa/20)*20;
		jumlah += (sisa/5);
		sisa -= (sisa/5)*5;
		jumlah += (sisa/1);
		hasil[c] = jumlah;
		jumlah = 0;
	}
	for (int d=0; d < a;d++){
		cout << hasil[d] << "\n";
	}
	return 0;
}
