#include <bits/stdc++.h>

using namespace std;

int main() {
    int ulangan, p, a, m, r;
    int hasil[100];
    cin >> ulangan;
    for(int i=0; i<ulangan; i++){
        cin >> p >> a >> m >> r;
        int harga,total;
        harga = p;
        total = p;
        int banyak=1;
        while(total<r){
            if(harga-a>m){
                harga = harga-a;
            }
            total = total + harga;
            banyak++;
        }
        hasil[ulangan]=banyak;
    }
    for(int i=0;i<ulangan;i++){
        cout << hasil[ulangan] << endl;
    }
	return 0;
}
