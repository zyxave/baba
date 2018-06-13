#include<bits/stdc++.h>

using namespace std;

struct compare {
    bool operator()(const std::string& first, const std::string& second) {
        return first.size() < second.size();
    }
};

int main(){
	int tc; scanf("%d", &tc);
	while(tc--){
		int n; scanf("%d", &n);
		string arr[n];
		for(int i = 0; i < n; i++) cin >> arr[i];
		compare c;
		sort(arr, arr + n, c);
		for(int i = 0; i < n; i++) cout << arr[i] << "\n";
	}
}