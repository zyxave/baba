#include <cstdio>
#include <iostream>
using namespace std;

int main () {
	int T;
	scanf ("%d", &T);
	while (T--) {
		int N, M;
		scanf ("%d %d", &N, &M);
		int arr [N];
		for (int b =0;b<N;b++) {
			scanf ("%d", &arr[b]);
		}
		for (int a =0;a<N;a++) {
			for (int b=0;b<N;b++) {
				if (a!=b && arr[a]+arr[b]==M) {
				printf ("%d %d\n", arr[a], arr[b]);
				break;
				}
				else printf ("Billy rapopo");
			}
		}
	}
	return 0;
}
