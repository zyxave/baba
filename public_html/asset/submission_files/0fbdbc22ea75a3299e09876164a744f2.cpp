#include <bits/stdc++.h>

using namespace std;
int a, n, d, r, arr[1005][2], ans;
int main(){
	
	cin >> a;
	for (int i = 0; i < a; i++){
		cin >> n >> d >> r;
		ans = 0;
		for (int j = 0; j < n; j++){
			cin >> arr[j][1];
		}
		for (int j = 0; j < n; j++){
			cin >> arr[j][2];
		}
		for (int j = 0; j < n; j++){
			if ((arr[j][2] + arr[j][1]) > d){
				ans = ans + arr[j][2] + arr[j][1] - d;
			}
		}
		
		cout << ans*r << "\n";
	}
	
	return 0;
}

