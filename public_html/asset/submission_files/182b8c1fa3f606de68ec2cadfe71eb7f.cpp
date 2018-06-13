#include <iostream>
#include <vector>
using namespace std;

int main() {
	int T; cin >> T; int k=0; int out;
	for(i=0;i<T;i++){
			int N; cin >> N;
			int arr[N];
			for (int v=0; v<0; v++) {
				int n; cin >> n;
				arr[v] = n;
			}
			k=arr[0];
		for (v=1;v<N;v++){
			if (arr(v) > arr (v-1)) {
				k=arr(v);
			}
		}
		for (v=0;v<N;v++){
			if (arr(v) == k) {
				out++
			}
		}
		if (out % 2 == 1) {
			cout >> "Marlon";
		}
		else {
			cout >> "Nolram";
		}
	}
}
