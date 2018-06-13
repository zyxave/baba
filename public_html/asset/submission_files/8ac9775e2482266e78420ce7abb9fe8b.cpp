#include <bits/stdc++.h>
using namespace std;

int main (){
	int T,N,M;
	cin >> T;
	for (int i = 1; i <= T; i++){
	cin >> N >> M;
	}
	int jml = 0;
	for (int j = N; j <= M; j ++){
		if(j % 11 == 0){
			jml = jml+1;
		}
	}
	cout << jml << endl;
	
}
