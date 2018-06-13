#include <iostream>

using namespace std;

int main() 
{
	int t,i,j,d,e;
	cin >> t;
	int h[t];
	for(i = 0;i < t;i++)
	{
		h[i] = 0;
		cin >> j;
		int m1[j],m2[j];
		for(d = 0;d < j;d++)
		{
			cin >> m1[d];
			cin >> m2[d]; 
		}
		for(d = 0;d < j;d++)
		{
			for(e = 0;e < j;e++)
			{
				if(m1[d] != 100001 && m1[e] != 100001 && m2[d] != 100001 && m2[e] != 100001)
				{
					if(m1[d] == m2[e] && m2[d] == m1[e])
					{
						h[i] = h[i] + 1;
						m1[d] = 100001;
						m2[e] = 100001;
						m2[d] = 100001;
						m1[e] = 100001;
					}
			    }
			}
		}
	}
	for(i = 0;i < t;i++)
	{
	cout << h[i] * 2 <<"\n";
	}	
	cin.get();
	cin.get();
	return 0;
}
