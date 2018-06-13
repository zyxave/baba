#include <iostream>
#include <cmath>
using namespace std;

int main ( ) {
	int c;
	int T; cin >> T;
	for (int q=0; q<T; q++) {
		int N; cin >> N;
		int K[N];
		for (int i=0; i<N; i++) {
			cin >> K[i];
		}
		
		for(int i=0;i<N-1;i++)
		{
			if(K[i]>K[i+1])
			{
				c=K[i];
				K[i]=K[i+1];
				K[i+1]=c;
			}
		}
		
		c=0;
		for (int i=0; i<N; i++) {
			for(int j=i+1; j<N;j++){
				c += (K[j] - K[i])*(j-i);
			}
		}
		cout << c;
	}
}
