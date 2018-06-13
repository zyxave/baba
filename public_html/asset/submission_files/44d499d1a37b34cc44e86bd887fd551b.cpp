#include <bits/stdc++.h>
using namespace std;
int a,b,x,T,N;
int buku[1000005];

int main(){
	cin >> N;
	for(int i=0;i<N;i++){
		cin >> a >> b;
		buku[a] = b;
	}
	cin >> T;
	for(int i=0;i<T;i++){
		cin >> x;
		cout << buku[x] << endl;
	}
}
