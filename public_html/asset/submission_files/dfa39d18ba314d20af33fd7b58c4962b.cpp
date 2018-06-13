#include <bits/stdc++.h>

using namespace std;

int main() {
    int ulangan, p, a, m, r;
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
        cout << banyak << endl;
    }
	return 0;
}
