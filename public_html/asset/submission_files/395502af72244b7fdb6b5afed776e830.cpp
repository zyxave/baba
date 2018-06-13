#include <bits/stdc++.h>

using namespace std;

int pangkat(int a, int b){
    int hasil=1;
    if(b==0){
        hasil=1;
    } else {
    for(int i=0;i<b;i++){
        hasil=hasil*a;
    }
    }
    return hasil;
}

int faktorial(int a){
    int b;
    if(a==0 || a==1){
        b=1;
    } else {
        b=faktorial(a-1)*a;
    }
    return b;
}

int kombinasi(int a,int b){
    int c;
    c = faktorial(a)/(faktorial(a-b)*faktorial(b));
    return c;
}

int main() {
	int t,x,p,q;
	cin >> t;
	string *hasil = new string[t]();
	for(int a=0;a<t;a++){
	    cin >> p >> q;
	    for(int i=0;i<q;i++){
	        if(i!=0){
	            if(q-i!=1){
	            	
	                cout << kombinasi(q,i)*pangkat(p,i) << "x" << q-i;
	            } else {
	                cout << kombinasi(q,i)*pangkat(p,i) << "x ";
	            }
	        } else {
	            cout << "x" << q-i << " ";
	        }
	    }
	    cout << pangkat(p,q) << "\n";
	}
	return 0;
}


