#include<bits/stdc++.h>
using namespace std;
int ada[1000];
int main()
{
	int t; cin >> t;		
	while(t--)
	{
		int a, b; 
		cin >> a >> b;	
		int res = 0;
		for(int j = a; j <= b; j++)
		{
			int i = j;
			memset(ada, 0, sizeof(ada));
			while(i)
			{
				if(ada[i%10])
				{
					res++;
					break;
				}
				ada[i%10] = 1;
				i /= 10;
			}
		}
		cout << res << "\n";	
	}
}
