#include <bits/stdc++.h>

using namespace std;

int main(){
	int a, n, d, r, arr[105][2], ans;
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
			if ((min(arr[j][1], arr[j][2])) > d){
				ans = ans + min(arr[j][1], arr[j][2]) - d;
			}
		}
		
		cout << ans*r << "\n";
	}
	
	return 0;
}

