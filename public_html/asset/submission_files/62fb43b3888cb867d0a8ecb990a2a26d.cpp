#include<bits/stdc++.h>

using namespace std;

int main(){
	int tc; scanf("%d", &tc);
	while(tc--){
		int n; scanf("%d", &n);
		string arr[n];
		for(int i = 0; i < n; i++) cin >> arr[i];
		sort(arr, arr + n);
		for(int i = 0; i < n; i++) cout << arr[i] << "\n";
	}
}